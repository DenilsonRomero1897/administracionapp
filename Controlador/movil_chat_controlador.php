<?php

 function chats (){
   require '../clases/Conexion.php';
   //traer los datos de la base de datos
//    $sql = "SELECT * FROM tbl_movil_chats";
//    $resultado = $mysqli->query($sql);

//    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
     $row = 0;
     while ($row <= 5 ) { 
     $id = 2;
     $nombre_usuario = 'nombre_usuario';
     $mensaje = 'descripcion';
     $row += 1;
    echo "
    <a class='hover:bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out'>
            <img class='h-10 w-10 rounded-full object-cover' src='' alt='photo' />
                 <div class='w-full pb-2'>
                     <div class='flex justify-between'>
                         <input type='hidden' name='id' value='$id'>
                         <span class='block ml-2 font-semibold text-base text-gray-600 '>$nombre_usuario</span>
                         <span class='block ml-2 text-sm text-gray-600'>time fetch</span>
                    </div>
                         <span class='block ml-2 text-sm text-gray-600'>$mensaje</span>
                </div>
     </a>

    ";
   } 
   
 }
