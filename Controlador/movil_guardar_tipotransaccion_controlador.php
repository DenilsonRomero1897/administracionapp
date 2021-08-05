<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');


$Id_objeto = 128;
$opcion = $_GET['op'];

if (isset($_POST['funcion'])) {
  if ($_POST['funcion']=='eliminar') {
      $id = (int)$_POST['id'];
              //se ejecuta el sql respectivo
              $sql = "DELETE FROM tbl_movil_tipo_transacciones where id = $id";
              $resultado = $mysqli->query($sql);
              if ($resultado) {
                  echo 'hola mundo';
              }else{
                  echo '';
              }
  }
}


if ($opcion == 'eliminar') {
  $id_tipotransaccion= isset($_GET["id"]) ? ($_GET["id"]) : "";
  $sql = "DELETE FROM tbl_movil_tipo_transacciones WHERE id = $id_tipotransaccion";
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
                                 window.location = "../vistas/movil_mantenimiento_tipo_transaccion_vista.php";

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
  $id_tipotransaccion = isset($_GET["id"]) ? ($_GET["id"]) : "";
  $descripcion = isset($_POST["descripcion"]) ? strtoupper($_POST["descripcion"]) : "";
  $external_id =isset($_POST["external_id"]) ? ($_POST["external_id"]) : "";
  $sql="UPDATE tbl_movil_tipo_transacciones set descripcion= '$descripcion', external_id ='$external_id' WHERE id = $id_tipotransaccion";
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'modifico', 'EL TIPO TRANSACCION' . $descripcion . '');
  $mysqli->query($sql);
  header('location: ../vistas/movil_mantenimiento_tipo_transaccion_vista.php?msj=2');
}else{
  $descripcion = isset($_POST["descripcion"]) ? strtoupper($_POST["descripcion"]) : "";
  $external_id =isset($_POST["external_id"]) ? ($_POST["external_id"]) : "";
  


///Logica para el que se repite
$sqlexiste = ("select count(descripcion) as descripcion from tbl_movil_tipo_transacciones where descripcion='$descripcion'");
//Obtener la fila del query
$existe = mysqli_fetch_assoc($mysqli->query($sqlexiste));



/* Logica para que no acepte campos vacios */
if ($_POST['descripcion']  ) {

  /* Condicion para que no se repita el rol*/
  if ($existe['descripcion'] == 1) {
    //redireccion ya que el nombre segmento existe
 	header('location: ../vistas/movil_mantenimiento_tipo_transaccion_vista.php?msj=1'); 
    
  } else {

    /* Query para que haga el insert*/
    $sql = "INSERT into tbl_movil_tipo_transacciones (id,descripcion,external_id) VALUES (null,'$descripcion','$external_id')";
    $resultado = $mysqli->query($sql);


    if ($resultado) {
      bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'inserto', "$sql");

      header('location: ../vistas/movil_mantenimiento_tipo_transaccion_vista.php?msj=2');
    } else {
      echo "Error: " . $sql;
    }
  }
} else {
  header('location: ../vistas/movil_mantenimiento_tipo_transaccion_vista.php?msj=3');
}

}
