<?php
require "../clases/conexion_mantenimientos.php";

$instancia_conexion = new conexion();

class segmentos
{
    	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para editar registros
	public function editar($nombre,$descripcion,$id)
	{	
		global $instancia_conexion;
		$sql="UPDATE tbl_movil_segmentos set nombre = $nombre , descripcion = $descripcion WHERE id = $id";
		return $instancia_conexion->ejecutarConsulta($sql);
		
	}
    public function eliminar($id){
        global $instancia_conexion;
        $sql = "DELETE tbl_movil_segmento WHERE id = $id";
        return $instancia_conexion->ejecutarConsulta($sql);
    }

}
