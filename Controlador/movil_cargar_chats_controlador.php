<?php require '../clases/Conexion.php';
    //traer los datos de la base de datos
    //traer el ultimo mensaje para mostrar en la bandeja
    //verificar que mensajes si estan sin leer
       session_start();
       //$sql = "SELECT u.Usuario,mc.mensaje,mc.fecha FROM tbl_movil_session_chats sc 
       //INNER JOIN tbl_movil_mensajes_chat mc on sc.id_session_chat = mc.id_session_chat
       //INNER JOIN tbl_usuarios u on mc.id_usuario = u.Id_usuario";
       $resultado = $mysqli->query("SELECT sc.id_session_chat,sc.id_usuario2,u.Usuario FROM tbl_movil_session_chats sc 
       INNER JOIN tbl_usuarios u on sc.id_usuario2 = u.Id_usuario");

   while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
         $id = $row['id_session_chat'];
         $id_usuario = $row['id_usuario2'];
         $nombre_usuario = $row['Usuario'];
        echo "
    <a onclick='getChats($id,$id_usuario)' class='hover:bg-gray-200 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out'>
            <!--<img class='h-10 w-10 rounded-full object-cover' src='' alt='photo' />-->
                 <div class='w-full p-2'>
                     <div class='flex justify-between'>
                         <span class='block ml-2 font-semibold text-base text-gray-600'>$nombre_usuario</span>
                         <!--<span class='block ml-2 text-sm text-gray-600'>fecha</span>-->
                    </div>
                    <!--<span class='block ml-2 text-sm text-gray-600'>mensaje</span>-->
                </div>
     </a>

    ";
    }