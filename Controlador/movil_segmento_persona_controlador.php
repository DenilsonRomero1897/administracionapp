<?php 
require_once('../clases/Conexion.php');

//comprobar que existe el post con los datos

//if(isset($_POST['Segmento']) and isset($_POST['persona'])){
    //almacenar los datos en variables 
    $id_segmento = $_POST['Segmento'];
    $personas = $_POST['persona'];
    
    foreach ($personas as $persona){
        $usuario = (int)$persona;
        $sql="CALL proc_insert_segmento_usuario($usuario,$id_segmento)";
        $mysqli->query($sql);
    }
    
//}

?>