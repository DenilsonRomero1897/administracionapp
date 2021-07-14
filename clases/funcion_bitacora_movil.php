   <?php


	class bitacora_movil {
		public static function evento_bitacora($usuario_id,$objeto_id,$accion,$descripcion)
		{
			   require ('../clases/Conexion.php');
			    $descripcion2 = str_replace("'",'',$descripcion);
			   	$sql = "INSERT INTO  tbl_movil_bitacoras (usuario_id, objeto_id, accion , descripcion , fecha)
    			 VALUES ('$usuario_id', '$objeto_id' , '$accion', '$descripcion2' , sysdate())";
		
			$mysqli->query($sql);
		}
		
}
		?>