<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
//require_once('../Modelos/movil_segmentos_modelo.php');

$Id_objeto = 128;
$opcion = $_GET['op'];

if ($opcion == 'eliminar') {
  $id_tiponotificacion = isset($_GET["id"]) ? ($_GET["id"]) : "";
  $sql = "DELETE FROM  tbl_movil_tipo_notificaciones WHERE id = $id_tiponotificacion";
  //Logica para traer el nombre del segmento
  $sqlnombre = "select descripcion from tbl_movil_tipo_notificaciones where id='$id_tiponotificacion'";
  //Obtener la fila del query
  $rows = mysqli_fetch_assoc($mysqli->query($sqlnombre));
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'elimino', "$sqlnombre");
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
                                 window.location = "../vistas/movil_mantenimiento_tipo_notificacion_vista.php";

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
}  


