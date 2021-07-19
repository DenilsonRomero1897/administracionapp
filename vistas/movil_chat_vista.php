<?php
require_once('../clases/Conexion.php');

require_once('../clases/funcion_bitacora_movil.php');

require_once('../vistas/pagina_inicio_vista.php');

require_once('../Controlador/movil_chat_controlador.php');
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body>
    <div class="content-wrapper">
        <!-- This is an example component -->
        <div class="w-100 h-auto">
            <div class="grid grid-cols-3 min-w-full border rounded" style="min-height: 80vh;">
                <!-- pagina chats -->
                <div class="col-span-1" style="background-color: #343A40;">
                    <div class="my-3 mx-3 border-b border-gray-300">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-500">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input aria-placeholder="Busca tus amigos o contacta nuevos" placeholder="Buscar Chat" class="py-2 pl-10 block w-full rounded bg-gray-100 outline-none focus:text-gray-700" type="search" name="search" required autocomplete="search" />
                        </div>
                    </div>

                    <span class="grid gap-1 grid-cols-3 overflow-auto">
                        <h2 class="ml-2 mb-2 mr-2 text-white text-lg my-1">Chats</h2>
                        <span></span>
                        <button class="ml-2 mb-2 mr-2 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Nuevo Chat" onclick="getUser()">Nuevo</button>
                    </span>
                    <ul class="overflow-auto bg-gray" style="height: 624px;">
                        <li>
                            <?php chats() ?>
                        </li>
                    </ul>
                </div>
                <!-- pagina mensajes -->
                <div class="col-span-2" style="background-image: url(../archivos/movil/background_chat3.png); background-position:center; background-size:400px;">
                    <div id="resultado_chat" class="col-span-2 bg-transparent overflow-auto" style="height: 743px;">
                    
                    </div>
                </div>
            </div>
            <script>
                function getChats(id_chat) {
                    var parametros = {
                        "id_chat": id_chat,
                        "llamando_chats": 'true'
                    }
                    $.ajax({
                        data: parametros, //datos que se envian a traves de ajax
                        url: '../Controlador/movil_chat_controlador.php', //archivo que recibe la peticion
                        type: 'post', //método de envio
                        beforeSend: function() {
                            $("#resultado_chat").html("Procesando, espere por favor...");
                        },
                        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                            $("#resultado_chat").html(response);
                        }
                    });
                }

                function getUser() {
                    var parametros = {
                        "funcion": 'buscarUsuarios'
                    }
                    $.ajax({
                        data: parametros, //datos que se envian a traves de ajax
                        url: '../Controlador/movil_chat_controlador.php', //archivo que recibe la peticion
                        type: 'post', //método de envio
                        beforeSend: function() {
                            $("#resultado_chat").html("Procesando, espere por favor...");
                        },
                        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                            $("#resultado_chat").html(response);
                        }
                    });
                }

                function cerrar() {
                    var parametros = {
                        "funcion": 'cerrar'
                    }
                    $.ajax({
                        data: parametros, //datos que se envian a traves de ajax
                        url: '../Controlador/movil_chat_controlador.php', //archivo que recibe la peticion
                        type: 'post', //método de envio
                        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                            $("#resultado_chat").html(response);
                        }
                    });
                }
                $(function() {
                    $('[data-toggle="tooltip"]').tooltip()
                })

                function click() {
                    $('#subir_archivo').click();
                }
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
</body>