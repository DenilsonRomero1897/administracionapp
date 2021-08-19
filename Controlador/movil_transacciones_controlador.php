<?php 
session_start();
ob_start();
function transaccion($request,$response,$estado,$tipo_transaccion){
    require_once('../clases/Conexion.php');
    $sql = "INSERT INTO tbl_movil_transacciones values (null,sysdate(),'$request','$response','$estado',$tipo_transaccion)";
    echo $sql;
    $resultado = $mysqli->query($sql);

    if($resultado){
        return true;
    }else{
        return false;
    }

}
ob_end_flush();
?>