<?php 
require_once('../clases/Conexion.php');
$id_chat = isset($_POST['id_chat']) ? (int)$_POST['id_chat'] : '';
$id_usuario = isset($_POST['id_usuario']) ? (int)$_POST['id_usuario'] : '';
$sql = "select p.nombres,p.apellidos from tbl_usuarios u INNER JOIN tbl_personas p ON u.id_persona = p.id_persona and u.Id_usuario = $id_usuario";  
$row2 = $mysqli->query($sql)->fetch_assoc();
        $nombre_usuario = $row2['nombres'].'-'.$row2['apellidos'];


echo '<div class="w-full">
    <div class="flex items-center border-b border-gray-300 pl-2 py-2" style="background-color:#007BFF;">
        <img class="h-10 w-10 rounded-full object-cover" src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="username" />
        <span class="w-80 block mr-10 ml-2 font-bold text-base text-white">'.$nombre_usuario.' </span>
    </div>
    <div id="chat" class="w-full overflow-y-auto p-1 relative" style="height: 599px;" ref="toolbarChat">
        <ul>
            <li class="clearfix2">';
            $sql_mensajes = "SELECT descripcion,interaccion from tbl_movil_chats where id = $id_chat";
            $resultado = $mysqli->query($sql_mensajes);
            //validar el mensaje si es recibido o enviado
            while ($row_msj = $resultado->fetch_array(MYSQLI_ASSOC)) { 
                $mensaje = $row_msj['descripcion'];
             if($row_msj['interaccion']=='recibido'){
            echo "
                 <div class='w-full flex justify-start'>
                     <div class='bg-gray-200 rounded px-5 py-2 my-2 ml-4 text-gray-700 relative' style='max-width: 300px;'>
                         <span class='block'>$mensaje</span>
                         <!--<span class='block text-xs text-right'>10:30pm</span>-->
                     </div>
                 </div>
             ";
            }elseif ($row_msj['interaccion']=='enviado') {
            echo "
                 <div class='w-full flex justify-end'>
                     <div class='bg-blue-500 rounded px-5 py-2 my-2 mr-4 text-white relative' style='max-width: 300px;'>
                         <span class='block'>$mensaje</span>
                         <!--<span class='block text-xs text-right'>10:30pm</span>-->
                     </div>
                 </div>
             ";
            }
        }
    echo   '</li>
        </ul>
    </div>
    <form action="../controlador/movil_envio_info_chat_controlador.php" method="POST">
    <div class="w-full py-2 px-2 flex items-center justify-between border-t border-gray-300" style="background-color:#007BFF;">
        <label for="subir_archivo" class="outline-none focus:outline-none ml-1">
            <svg class="text-gray-400 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
        </label>
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

?>