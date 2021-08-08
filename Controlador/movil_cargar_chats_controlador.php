<?php require '../clases/Conexion.php';
    //traer los datos de la base de datos
    //traer el ultimo mensaje para mostrar en la bandeja
    //verificar que mensajes si estan sin leer
       session_start();
       $sql = "SELECT * FROM tbl_movil_chats";
       $resultado = $mysqli->query($sql);

   while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
        $id = $row['id'];
        $id_usuario = $row['usuario_emisor_id'];
        $sql = "select p.nombres,p.apellidos from tbl_usuarios u INNER JOIN tbl_personas p ON u.id_persona = p.id_persona and u.Id_usuario = $id_usuario";
        $row2 = $mysqli->query($sql)->fetch_assoc();
        $nombre_usuario = $row2['nombres'].'-'.$row2['apellidos'];
        $fecha = date('d-m-Y h:i');
        $mensaje = $row['descripcion'];
        echo "
    <a onclick='getChats($id,$id_usuario)' class='hover:bg-gray-200 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out'>
            <!--<img class='h-10 w-10 rounded-full object-cover' src='' alt='photo' />-->
                 <div class='w-full p-2'>
                     <div class='flex justify-between'>
                         <span class='block ml-2 font-semibold text-base text-gray-600'>$nombre_usuario</span>
                         <span class='block ml-2 text-sm text-gray-600'>$fecha</span>
                    </div>
                         <span class='block ml-2 text-sm text-gray-600'>$mensaje</span>
                </div>
     </a>

    ";
    }