<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');




switch ($_GET['op']) {
    case 'insert':
        $titulo = isset($_POST['titulo']) ? strtoupper($_POST['titulo']) : '';
        $contenido = isset($_POST['Contenido']) ? strtoupper($_POST['Contenido']) : '';
        $segmento = isset($_POST['Segmentos']) ? $_POST['Segmentos'] : '';
        $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
        $fecha_vencimiento= date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_vencimiento']));
        $sql = "INSERT into tbl_movil_noticias (titulo,descripcion,fecha,fecha_vencimiento,remitente,segmento_id) VALUES ('$titulo','$contenido','$fecha_publicacion','$fecha_vencimiento','ADMIN',$segmento)";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
                bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'INSERTO',strtoupper("$sql"));
                header('location: ../vistas/movil_gestion_noticia_vista.php?msj=2');
            }
        break;

    case 'delete':
        $id = $_GET['id'];
        $sql = "DELETE from tbl_movil_noticias WHERE id = $id";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
                bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'ELIMINO',strtoupper("$sql"));
                echo '<script type="text/javascript">
                swal({
                     title:"",
                     text:"Los datos se eliminaron correctamente",
                     type: "success",
                     showConfirmButton: false,
                     timer: 3000
                  });
                  $(".FormularioAjax")[0].reset();
                                 window.location = "../vistas/movil_gestion_noticia_vista.php";
              </script>';
            }
        break; 
        
    case 'editar':
        $id = $_GET['id'];
        $titulo = isset($_POST['titulo']) ? strtoupper($_POST['titulo']) : '';
        $contenido = isset($_POST['Contenido']) ? $_POST['Contenido'] : '';
        $segmento = $_POST['Segmentos'];
        $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
        $fecha_vencimiento = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_vencimiento']));
        $sql = "UPDATE tbl_movil_noticias SET titulo = '$titulo', descripcion = '$contenido', fecha = '$fecha_publicacion',fecha_vencimiento = '$fecha_vencimiento', remitente = 'ADMIN', segmento_id = $segmento where id = $id";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
                bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'MODIFICO',strtoupper("$sql"));
                header('location: ../vistas/movil_gestion_noticia_vista.php?msj=2'); 
            }
        break;
    
}


?>