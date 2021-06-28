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
        $fecha_publicacion = date('Y-m-d ',strtotime($_POST['txt_fecha_Publicacion']));
        var_dump($fecha_publicacion) or die;
        $sql = "INSERT into tbl_movil_notificaciones VALUES (null,'$titulo','$contenido',$fecha_publicacion,'ADMIN',$segmento,1,0)";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
            header('location: ../vistas/movil_gestion_notificaciones_vista.php?msj=2');
            }
        break;

    case 'delete':
        $id_publicacion = $_POST['id'];

        break; 
        
    case 'update':
        $id_publicacion = $_POST['id'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['Contenido'];
        $segmento = $_POST['Segmentos'];
        $fecha_publicacion = $_POST['txt_fecha_Publicacion'];

        break;
    case 'mostrar':
        
        break;
    
    default:
        # code...
        break;
}


?>