<?php

$funcion = isset($_POST['funcion']) ? $_POST['funcion'] : '';
if ($funcion == 'buscarUsuarios') {
    getUser();
}

function getUser()
{
    require '../clases/Conexion.php';

        $sql = "SELECT u.Id_usuario,p.nombres,p.apellidos FROM tbl_usuarios u INNER JOIN
        tbl_personas p on u.id_persona = p.id_persona";
        $resultado = $mysqli->query($sql);
   
    echo '<div class="col-span-1">
  
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
      while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
        $id = $row['Id_usuario'];
        $nombre_usuario = $row['nombres'].' '.$row['apellidos'];
        echo "
     <a onclick='getid($id)' class='hover:bg-gray-100 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out'>
             <img class='h-10 w-10 rounded-full object-cover' src='' alt='photo' />
                  <div class='w-full p-2'>
                      <div class='flex justify-between'>
                          <span class='block ml-2 font-semibold text-base text-gray-600'>$nombre_usuario</span>
                     </div> 
                 </div>
      </a>
     ";
    }
    echo '</div>';
}

$funcion = isset($_POST['funcion']) ? $_POST['funcion'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($funcion == 'crearNuevoChat') {
    CrearChat($id);
}

function CrearChat($id){
    
}
