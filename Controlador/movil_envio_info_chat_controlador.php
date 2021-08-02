<?php 
require_once('../clases/Conexion.php');


if (isset($_POST)) {
    if ( !empty($_POST['message']) and empty($_POST['subir_archivos'])) {
        $sql = "INSERT INTO ";
    }
}

?>