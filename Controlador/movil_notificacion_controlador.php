<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
//require_once('../Modelos/movil_notificaiones_modelo.php');



switch ($_GET['op']) {
    case 'insert':
        $titulo = $_POST['titulo'];
        $contenido = $_POST['Contenido'];
        $segmento = $_POST['Segmentos'];
        $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
        $sql = "INSERT into tbl_movil_notificaciones (titulo,descripcion,fecha,remitente,segmento_id,tipo_notificacion_id,image_enable) VALUES ('$titulo','$contenido','$fecha_publicacion','ADMIN',$segmento,1,0)";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
            header('location: ../vistas/movil_gestion_notificaciones_vista.php?msj=2');
            }
        break;

    case 'delete':
        $id = $_GET['id'];
        $sql = "DELETE from tbl_movil_notificaciones WHERE id = $id";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
                echo '<script type="text/javascript">
                swal({
                     title:"",
                     text:"Los datos  se eliminaron correctamente",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000
                  });
                  $(".FormularioAjax")[0].reset();
                                 window.location = "../vistas/movil_gestion_notificaciones_vista.php";
              </script>';
            }
        break; 
        
    case 'editar':
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['Contenido'];
        $segmento = $_POST['Segmentos'];
        $tipo_notificacion = $_POST['tipo_notificacion'];
        $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
        $sql = "UPDATE tbl_movil_notificaciones SET titulo = '$titulo', descripcion = '$contenido', fecha = '$fecha_publicacion', remitente = 'ADMIN', segmento_id = $segmento, tipo_notificacion_id = $tipo_notificacion , image_enable = 0 where id = $id";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
            header('location: ../vistas/movil_gestion_notificaciones_vista.php?msj=2');
            }
        break;
    
}


?>