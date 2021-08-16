   <?php


	class bitacora_movil {
		public static function evento_bitacora($usuario_id,$objeto_id,$accion,$descripcion)
		{
			   require ('../clases/Conexion.php');
			    $descripcion2 = $mysqli->escape_string($descripcion);
			   	$sql_bitacora = "INSERT INTO  tbl_movil_bitacora (usuario_id, objeto_id, accion , descripcion , fecha)
    			 VALUES ('$usuario_id', '$objeto_id' , '$accion', '$descripcion2' , sysdate())";
		        var_dump($sql_bitacora); 
			$mysqli->query($sql_bitacora);
		}
		
}
		?>