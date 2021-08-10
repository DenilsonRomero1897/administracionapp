<?php require_once "../clases/conexion_mantenimientos.php";
//require_once "../clases/Conexion.php";

$instancia_conexion = new conexion();



class modelo_registro_notificacion
{

    public function Registrar($nombrearchivo){
        global $instancia_conexion;
        $sql="";
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    
}