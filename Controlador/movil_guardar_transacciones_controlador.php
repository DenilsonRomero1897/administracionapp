<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');


$Id_objeto = 128;
$opcion = isset($_GET["op"]) ? ($_GET["op"]) : "";


if ($opcion == 'eliminar') {
  $id_transacciones= isset($_GET["id"]) ? ($_GET["id"]) : "";
  $sql = "DELETE FROM tbl_movil_transacciones WHERE id = $id_transacciones";
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'ELIMINO', "$sql");
  $resultado = $mysqli->query($sql);
  if($resultado === TRUE){
            echo '<script type="text/javascript">
                swal({
                     title:"",
                     text:"Los datos se eliminaron correctamente",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000
                  });
                  $(".FormularioAjax")[0].reset();
                                 window.location = "../vistas/movil_gestion_transacciones_vista.php";

              </script>';
          }else{
            echo '<script type="text/javascript">
                      swal({
                         title:"",
                         text:"No se realizo el proceso, el registro a eliminar tiene datos en otras tablas",
                         type: "error",
                         showConfirmButton: false,
                         timer: 3000
                      });
                       $(".FormularioAjax")[0].reset();
                  </script>';
          }
}elseif ($opcion == 'editar') {
  //funcionalidad para ejecutar el update
  $id_transacciones = isset($_GET["id"]) ? ($_GET["id"]) : "";
  $fecha_envio = isset($_POST["fecha_envio"]) ? strtoupper($_POST["fecha_envio"]) : "";
  $request_envio = isset($_POST["request_envio"]) ? strtoupper($_POST["request_envio"]) : "";
  $response = isset($_POST["response"]) ? strtoupper($_POST["response"]) : "";
  $estado = isset($_POST["estado"]) ? strtoupper($_POST["estado"]) : "";
  $tipo_transaccion_id= isset($_POST["tipo_transaccion_id"]) ? strtoupper($_POST["tipo_transaccion_id "]) : "";
  

  $sql="UPDATE tbl_movil_transacciones set fecha_envio= '$fecha_envio', request_envio= '$request_envio', response=  '$response', estado=  '$estado' , tipo_transaccion_id=  '$tipo_transaccion_id' , WHERE id = $id_transacciones";
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'MODIFICO', 'LA TRANSACCIÓN' . $id_transacciones. '');
  $mysqli->query($sql);
  header('location: ../vistas/movil_gestion_transacciones_vista.php?msj=2');
}else{
  //se almacenan los valores para realizar el insert
  $request_envio = isset($_POST["request_envio"]) ? strtoupper($_POST["request_envio"]) : "";
  $response = isset($_POST["response"]) ? strtoupper($_POST["response"]) : "";
  $estado = isset($_POST["estado"]) ? strtoupper($_POST["estado"]) : "";
  $tipo_transaccion_id = isset($_POST["tipo_transaccion_id"]) ? (int)$_POST["tipo_transaccion_id"] : "";
  
/* Logica para que no acepte campos vacios */
if ($_POST['request_envio'] <>  ' ' and  $_POST['response'] <>' 'and  $_POST['estado'] <> '' and  $_POST['tipo_transaccion_id'] <> '' ) {
    /* Query para que haga el insert*/
    $sql = "INSERT into tbl_movil_transacciones VALUES (null,sysdate(),'$request_envio', '$response', '$estado','$tipo_transaccion_id')";
    
    $resultado = $mysqli->query($sql);
 
    if ($resultado) {
      bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INSERTO',strtoupper("$sql"));

      header('location: ../vistas/movil_gestion_transacciones_vista.php?msj=2');
    } else {
      echo "Error: " . $sql;
    }
  
} else {
  header('location: ../vistas/movil_gestion_transacciones_vista.php?msj=3');
}

}
