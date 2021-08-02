<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');


$Id_objeto = 12;
$opcion = isset($_GET['op']) ? $_GET['op'] : '';


if ($opcion == 'eliminar') {
  $id_parametros= isset($_GET["id"]) ? ($_GET["id"]) : "";
  $sql = "DELETE FROM tbl_movil_parametros WHERE id = $id_parametros";
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'elimino', "$sql");
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
                                 window.location = "../vistas/movil_gestion_parametros_vista.php";

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
  $id_parametros= isset($_GET["id"]) ? ($_GET["id"]) : "";
 // $parametro= isset($_POST["parametro"]) ? strtoupper($_POST["parametro"]) : "";
 //$descripcion = isset($_POST["descripcion"]) ? strtoupper($_POST["descripcion"]) : "";
  $valor = isset($_POST["valor"]) ? strtoupper($_POST["valor"]) : "";
  $sql = "UPDATE tbl_movil_parametros set  valor= '$valor' WHERE id = $id_parametros";
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'modifico', 'EL PARAMETRO' . $id_parametros. '');
  $mysqli->query($sql);
  header('location: ../vistas/movil_gestion_parametros_vista.php?msj=2');
}else{
  //se almacenan los valores para realizar el insert
  $parametro = isset($_POST["parametro"]) ? strtoupper($_POST["parametro"]) : "";
  $descripcion = isset($_POST["descripcion"]) ? strtoupper($_POST["descripcion"]) : "";
  $valor = isset($_POST["valor"]) ? strtoupper($_POST["valor"]) : "";
  $fecha_modificacion= isset($_POST["txt_fecha_modificacion"]) ? $_POST["txt_fecha_modificacion"] : "";
  $modificadopor = isset($_SESSION['id_usuario']) ? ($_SESSION['id_usuario']) : "";
  $usuario_id = isset($_SESSION['id_usuario']) ? ($_SESSION['id_usuario']) : "";
  
/* Logica para que no acepte campos vacios */
if ($_POST['parametro'] <>  ' ' and  $_POST['descripcion'] <>' 'and  $_POST['valor'] <> '' ) {
    /* Query para que haga el insert*/
    $sql = "INSERT into tbl_movil_parametros  VALUES (null,'$parametro', '$descripcion', '$valor','$fecha_modificacion' , '$modificadopor', '$usuario_id' )";
    
    $resultado = $mysqli->query($sql);
 
    if ($resultado) {
      bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'inserto',strtoupper("$sql"));

      header('location: ../vistas/movil_gestion_parametros_vista.php?msj=2');
    } else {
      echo "Error: " . $sql;
    }
  
} else {
  header('location: ../vistas/movil_gestion_parametros_vista.php?msj=3');
}

}