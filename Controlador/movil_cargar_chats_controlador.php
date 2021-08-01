<?php require '../clases/Conexion.php';
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