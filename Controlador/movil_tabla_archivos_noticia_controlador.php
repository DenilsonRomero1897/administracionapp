<?php
require_once('../clases/Conexion.php'); 


if (isset($_POST['funcion'])) {
    if ($_POST['funcion']=='eliminar') {
        eliminar();
    }
}
function eliminar(){
    $id = (int)$_POST['id'];
    global $mysqli;
  $sql = "DELETE FROM tbl_movil_noticia_recurso WHERE recurso_id = $id";
  $resultado = $mysqli->query($sql);
  if ($resultado) {
      return 'hola_mundo';
  }else{
      return '';
  }
}

?>
