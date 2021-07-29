<?php 
require_once ('../clases/Conexion.php');
require_once ('../clases/funcion_bitacora_movil.php');


if (isset($_POST)) {
   if ($_POST['funcion']=='eliminar') {
      $id = (int)$_POST['id'];
                //se ejecuta el sql respectivo
                $sql = "DELETE FROM tbl_movil_segmentos where id = $id";
                $resultado = $mysqli->query($sql);
                var_dump($resultado);
                
                if ($resultado) {
                    echo 'hola mundo';
                }else{
                    echo 'f';
                }
   }



}else{
   echo 'no existe el metodo post';
}


?>