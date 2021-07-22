<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');


$Id_objeto = 128;
$opcion = $_GET['op'];


if ($opcion == 'eliminar') {
  $id_parametro= isset($_GET["id"]) ? ($_GET["id"]) : "";
  $sql = "DELETE FROM tbl_movil_parametros WHERE id = $id_parametro";
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
  $id_parametro = isset($_GET["id"]) ? ($_GET["id"]) : "";
  $parametro = isset($_POST["parametro"]) ? strtoupper($_POST["parametro"]) : "";
  $descripcion = isset($_POST["descripcion"]) ? strtoupper($_POST["descripcion"]) : "";
  $valor=isset($_POST["valor"]) ? strtoupper($_POST["valor"]) : "";
  $sql="UPDATE tbl_movil_parametros  set parametro= '$parametro', descripcion= '$descripcion', valor ='$valor' WHERE id = $id_parametro";
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'modifico', 'EL PARAMETRO' . $parametro. '');
  $mysqli->query($sql);
  header('location: ../vistas/movil_gestion_parametros_vista.php?msj=2');
}else{
  $parametro = isset($_POST["parametro"]) ? strtoupper($_POST["parametro"]) : "";
  $descripcion = isset($_POST["descripcion"]) ? strtoupper($_POST["descripcion"]) : "";
  $valor =isset($_POST["valor"]) ? strtoupper($_POST["valor"]) : "";
  


///Logica para el que se repite
$sqlexiste = ("select count(parametro) as parametro from tbl_movil_parametros where parametro='$parametro'");
//Obtener la fila del query
$existe = mysqli_fetch_assoc($mysqli->query($sqlexiste));



/* Logica para que no acepte campos vacios */
if ($_POST['parametro']  ) {

  /* Condicion para que no se repita el rol*/
  if ($existe['parametro'] == 1) {
    //redireccion ya que el nombre segmento existe
 	header('location: ../vistas/movil_gestion_parametros_vista.php?msj=1'); 
    
  } else {

    /* Query para que haga el insert*/
    $sql = "INSERT into tbl_movil_parametros (id,parametro,descripcion,valor,fecha_modificacion, modificador por, usuario_id)   VALUES (null,'$parametro',$descripcion','$valor', $modificadopor', $usuario_id', sysdate())";
    $resultado = $mysqli->query($sql);


    if ($resultado) {
      bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'inserto', "$sql");

      header('location: ../vistas/movil_gestion_parametros_vista.php?msj=2');
    } else {
      echo "Error: " . $sql;
    }
  }
} else {
  header('location: ../vistas/movil_gestion_parametros_vista.php?msj=3');
}

}
