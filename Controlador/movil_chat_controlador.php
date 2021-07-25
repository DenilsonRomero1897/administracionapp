<?php

function chats()
{
    require '../clases/Conexion.php';
    //traer los datos de la base de datos
    //traer el ultimo mensaje para mostrar en la bandeja
    //verificar que mensajes si estan sin leer

    //    $sql = "SELECT * FROM tbl_movil_chats";
    //    $resultado = $mysqli->query($sql);

    //    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
    $row = 0;
    while ($row <= 10) {
        $id = $row;
        $nombre_usuario = 'nombre_usuario';
        $mensaje = 'descripcion';
        $row += 1;
        //se muertran los chats en pantalla
        echo "
    <a onclick='getChats($id)' class='hover:bg-gray-200 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out'>
            <img class='h-10 w-10 rounded-full object-cover' src='' alt='photo' />
                 <div class='w-full p-2'>
                     <div class='flex justify-between'>
                         <span class='block ml-2 font-semibold text-base text-gray-600'>$nombre_usuario</span>
                         <span class='block ml-2 text-sm text-gray-600'>time fetch</span>
                    </div>
                         <span class='block ml-2 text-sm text-gray-600'>$mensaje</span>
                </div>
     </a>

    ";
    }
}

$resultado = isset($_POST['llamando_chats']) ? $_POST['llamando_chats'] : false;
$id_chat = isset($_POST['id_chat']) ? (int)$_POST['id_chat'] : '';
if ($resultado == 'true') {
    mensajes($id_chat);
}

function mensajes($id_chat)
{
    //se carga la pantalla de chat
    echo '<div class="w-full">
    <div class="flex items-center border-b border-gray-300 pl-3 py-3" style="background-color:#007BFF;">
        <img class="h-10 w-10 rounded-full object-cover" src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="username" />
        <span class="w-80 block mr-10 ml-2 font-bold text-base text-white">' . $id_chat . '</span>
    </div>
    <div id="chat" class="w-full overflow-y-auto p-1 relative" style="height: 599px;" ref="toolbarChat">
        <ul>
            <li class="clearfix2">';
    mensaje();
    echo   '</li>
        </ul>
    </div>
    <form action="../controlador/movil_chat_mensajeria_controlador.php">
    <div class="w-full py-3 px-3 flex items-center justify-between border-t border-gray-300" style="background-color:#007BFF;">
        <button class="outline-none focus:outline-none ml-1" onclick="click()">
            <svg class="text-gray-400 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
        </button>
        <input name="subir_archivos" id="subir_archivo" style="display:none;" type="file"/>

        <input aria-placeholder="Escribe un mensaje aquí" placeholder="Escribe un mensaje aquí" class="py-2 mx-3 pl-5 block w-full rounded-full bg-gray-100 outline-none focus:text-gray-700" type="text" name="message" />

        <button class="outline-none focus:outline-none" type="submit">
            <svg class="text-gray-400 h-7 w-7 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
        </button>
    </div>
    </form>
</div>';
}

function mensaje()
{
    //traer los datos del mensaje segun id

    //validar el mensaje si es recibido o enviado
    // if(validarinteraccion del mensaje){}
    echo '
         <div class="w-full flex justify-start">
             <div class="bg-gray-100 rounded px-5 py-2 my-2 ml-4 text-gray-700 relative" style="max-width: 300px;">
                 <span class="block">Hello</span>
                 <span class="block text-xs text-right">10:30pm</span>
             </div>
         </div>
     ';
    //}else{
    echo '
         <div class="w-full flex justify-end">
             <div class="bg-blue-500 rounded px-5 py-2 my-2 mr-4 text-white relative" style="max-width: 300px;">
                 <span class="block">Hi</span>
                 <span class="block text-xs text-right">10:31pm</span>
             </div>
         </div>
     ';
    //}
}
$funcion = isset($_POST['funcion']) ? $_POST['funcion'] : '';
if ($funcion == 'cerrar') {
    cerrar();
}
function cerrar()
{
    echo '';
}

$funcion = isset($_POST['funcion']) ? $_POST['funcion'] : '';
if ($funcion == 'buscarUsuarios') {
    getUser();
}

function getUser()
{
    require '../clases/Conexion.php';
    //traer los datos de la base de datos
    //traer el ultimo mensaje para mostrar en la bandeja
    //verificar que mensajes si estan sin leer

    //    $sql = "SELECT * FROM tbl_movil_chats";
    //    $resultado = $mysqli->query($sql);

    //    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
    $row = 0;
    echo '<div class="col-span-1" style="background-color: #343A40;">
      <div class="row" style="background-color:blue; color:white;">
      <h2 class="col-11">Seleccione al Usuario para chatear</h2>
      <a class="col btn btn-danger btn-xs" onclick="cerrar()">x</a>
        </div>
        
                    <div class="my-3 mx-3 border-b border-gray-300">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-500">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input aria-placeholder="Busca tus amigos o contacta nuevos" placeholder="Buscar Usuario" class="py-2 pl-10 block w-full rounded bg-gray-100 outline-none focus:text-gray-700" type="search" name="search" required autocomplete="search" />
                        </div>
                    </div>
      ';
    while ($row <= 20) {
        $id = $row;
        $nombre_usuario = 'nombre_usuario';
        $row += 1;
        //se muertran los chats en pantalla
        echo "
     <a onclick='getid($id)' class='hover:bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out'>
             <img class='h-10 w-10 rounded-full object-cover' src='' alt='photo' />
                  <div class='w-full p-2'>
                      <div class='flex justify-between'>
                          <span class='block ml-2 font-semibold text-base text-gray-600 '>$nombre_usuario</span>
                     </div> 
                 </div>
      </a>
 
     ";
    }
    echo '</div>';
}

$funcion = isset($_POST['funcion']) ? $_POST['funcion'] : '';
if ($funcion == 'crearNuevoChat') {
    CrearChat();
}

function CrearChat(){
    require_once '../clases/Conexion.php';
    //$sql = '';
   // $mysqli->query($sql);
    //conseguir el id de chat creado
    //$sql = '';
    mensajes(5);
}

function buscarUsuarios(){
    require_once '../clases/Conexion.php';
    $sql = "SELECT id,nombre FROM tbl_usuarios";
    $resultado = $mysqli->query($sql);
    echo '<div class="form-group">';
       echo' <select class="form-control" name="buscar_usuario" id="buscar_usuario" onchange="buscar_usuario()">';
                  while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
                      $id = $row['id'];
                      $nombre = $row['nombre'];
                    echo "<option value='$id'>$nombre</option>";
                    } 
             echo "</select>";
             echo "</div>";
    
}

?>