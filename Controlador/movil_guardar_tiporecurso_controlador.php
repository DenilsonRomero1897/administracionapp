<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
/*require_once('../Modelos/segmentos_modelo.php');*/

$Id_objeto = 128;
$opcion = $_GET['op'];
/*$tiporecurso = new segmentos();*/
if ($opcion == 'eliminar') {
  $id_tiporecurso = isset($_GET["id"]) ? ($_GET["id"]) : "";
  $sql = "DELETE FROM tbl_movil_tipo_recursos WHERE id = $id_tiporecurso";
  //Logica para traer el nombre del tipo recurso
  $sqlnombre = "select descripcion from tbl_movil_tipo_recursos where id='$id_tiporecurso'";
  //Obtener la fila del query
  $rows = mysqli_fetch_assoc($mysqli->query($sqlnombre));
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'elimino', 'TIPO RECURSO  ' . $rows['descripcion'] . '');
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
                                 window.location = "../vistas/movil_mantenimiento_tipo_recurso_vista.php";

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
  $id_tiporecurso = isset($_GET["id"]) ? ($_GET["id"]) : "";
  $descripcion = isset($_POST["descripcion"]) ? ($_POST["descripcion"]) : "";
  $url = isset($_POST["url"]) ? ($_POST["url"]) : "";
  $sql="UPDATE tbl_movil_tipo_recursos set descripcion= '$descripcion', url= '$url' WHERE id = $id_tiporecurso";
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'modifico', 'EL TIPO RECURSO ' . $descripcion . '');
  $mysqli->query($sql);
  header('location: ../vistas/movil_mantenimiento_tipo_recurso_vista.php?msj=2');
}else{
  $descripcion = isset($_POST["descripcion"]) ? ($_POST["descripcion"]) : "";
  $url = isset($_POST["url"]) ? ($_POST["url"]) : "";
  


///Logica para el que se repite
$sqlexiste = ("select count(descripcion) as descripcion from tbl_movil_tipo_recursos where descripcion='$descripcion'");
//Obtener la fila del query
$existe = mysqli_fetch_assoc($mysqli->query($sqlexiste));



/* Logica para que no acepte campos vacios */
if ($_POST['descripcion']  <> ' ' and  $_POST['url'] <> '' ) {

  /* Condicion para que no se repita el rol*/
  if ($existe['descripcion'] == 1) {
    //redireccion ya que el nombre segmento existe
 	header('location: ../vistas/movil_mantenimiento_tipo_recurso_vista.php?msj=1'); 
    
  } else {

    /* Query para que haga el insert*/
    $sqlID = "SELECT id FROM `tbl_movil_tipo_recursos` ORDER BY id DESC LIMIT 1";
    $IDs = mysqli_fetch_assoc($mysqli->query($sqlID));
    $id = (int)$IDs['id'] + 1;
    $sql = "INSERT into tbl_movil_tipo_recursos (id,descripcion,url) VALUES ($id,'$descripcion','$url')";
    $resultado = $mysqli->query($sql);


    if ($resultado) {
      bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'inserto', 'EL TIPO RECURSO ' . $descripcion . '');

      header('location: ../vistas/movil_mantenimiento_tipo_recurso_vista.php?msj=2');
    } else {
      echo "Error: " . $sql;
    }
  }
} else {
  header('location: ../vistas/movil_mantenimiento_tipo_recurso_vista.php?msj=3');
}

}
