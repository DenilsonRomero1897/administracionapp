<?php require_once "../clases/conexion_mantenimientos.php";
//require_once "../clases/Conexion.php";

$instancia_conexion = new conexion();



class modelo_registro_notificacion
{

    public function Registrar_imagen($nombrearchivo){
        global $instancia_conexion;
        $sql="INSERT INTO tbl_movil_tipo_recursos Values (null,'archivo subido desde crear notificacion','$nombrearchivo')";
        return $instancia_conexion->ejecutarConsulta($sql);
    }

    function buscar_id_notificacion($titulo,$fecha)
     {
         global $instancia_conexion;
         $sql = "SELECT id FROM tbl_movil_notificaciones WHERE titulo = '$titulo' and fecha = '$fecha'";
         return $instancia_conexion->ejecutarConsultaSimpleFila($sql);
     }
     
    function buscar_id_recurso($url)
    {
        global $instancia_conexion;
        $sql = "SELECT id,url FROM tbl_movil_tipo_recursos WHERE url = '$url'";
        return $instancia_conexion->ejecutarConsultaSimpleFila($sql);
    }

    function insert_notificacion_recurso($id_noticia,$id_recurso)
    {
        global $instancia_conexion;
        $sql="INSERT INTO tbl_movil_notificacion_recurso Values ($id_noticia,$id_recurso)";
        return $instancia_conexion->ejecutarConsulta($sql);
    }
}