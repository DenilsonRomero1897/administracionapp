<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../Controlador/movil_api_controlador.php');

if (isset($_GET['op'])) {
    $url ='https://apiappinfomatica.000webhostapp.com/modulos/notificaciones/envioNotificaciones.php';
$datos = [];
$Id_objeto = 130;
$id = 4;
switch ($_GET['op']) {
    case 'insert':
        $titulo = isset($_POST['titulo']) ? strtoupper($_POST['titulo']) : '';
        $contenido = isset($_POST['Contenido']) ? strtoupper($_POST['Contenido']) : '';
        $segmento = isset($_POST['Segmentos']) ? $_POST['Segmentos'] : '';
        $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
        $notificacion = isset($_POST['notificacion']) ? $_POST['notificacion'] : 'NOTIFICACION NORMAL';
        //buscar el id notificacion normal
        $sql_id_notificacion = "SELECT id FROM tbl_movil_tipo_notificaciones WHERE descripcion = '$notificacion'";
        $resul = $mysqli->query($sql_id_notificacion);
        $id_tipo_notificacion = $resul->fetch_assoc();
        $tipo_notificacion = (int)$id_tipo_notificacion['id'];
        //
        $sql = "INSERT into tbl_movil_notificaciones (titulo,descripcion,fecha,remitente,segmento_id,tipo_notificacion_id,image_enable) VALUES ('$titulo','$contenido','$fecha_publicacion','ADMIN',$segmento,$tipo_notificacion,0)";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
                bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'INSERTO',strtoupper("$sql"));
                
                 //Llenado del arreglo
                // array_push($datos, ["idLote"=>(int)$id]);
                // array_push($datos, ["titulo"=>$titulo]);
                 //array_push($datos, ["contenido"=>$contenido]);
                 //array_push($datos, ["urlRecurso"=>0]);
                 //array_push($datos, ["segmento"=>(int)$segmento]);
                 //var_dump($datos);
                 //die;
                // $response = consumoApi($url, $datos);
            
                
                header('location: ../vistas/movil_gestion_notificaciones_vista.php?msj=2');
            }
        break;
        
    case 'editar':
        $id = $_GET['id'];
        $titulo = isset($_POST['titulo']) ? strtoupper($_POST['titulo']) : '';
        $contenido = isset($_POST['Contenido']) ? $_POST['Contenido'] : '';
        $segmento = $_POST['Segmentos'];
        $tipo_notificacion = $_POST['tipo_notificacion'];
        $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
        $sql = "UPDATE tbl_movil_notificaciones SET titulo = '$titulo', descripcion = '$contenido', fecha = '$fecha_publicacion', remitente = 'ADMIN', segmento_id = $segmento, tipo_notificacion_id = $tipo_notificacion , image_enable = 0 where id = $id";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
                bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'MODIFICO',strtoupper("$sql"));
                header('location: ../vistas/movil_gestion_notificaciones_vista.php?msj=2');
            }
        break;
    
}
}

if (isset($_POST['funcion'])) {
    if ($_POST['funcion']=='eliminar') {
        $id = (int)$_POST['id'];
                //se ejecuta el sql respectivo
                $sql = "DELETE FROM tbl_movil_notificaciones where id = $id";
                $resultado = $mysqli->query($sql);
                if ($resultado) {
                    echo 'hola mundo';
                }else{
                    echo '';
                }
    }
}


function crearNotificacion($url,$tipo_notificacion,$Id_objeto,$id,$titulo,$contenido,$segmento){
    require_once('../clases/Conexion.php');
    require_once('../clases/funcion_bitacora_movil.php');
    require_once('../Controlador/movil_api_controlador.php');
    $sql_id_notificacion = "SELECT id FROM tbl_movil_tipo_notificaciones WHERE descripcion = '$tipo_notificacion'";
    $resul = $mysqli->query($sql_id_notificacion);
    $id_tipo_notificacion = $resul->fetch_assoc();
    $tipo_notificacion = (int)$id_tipo_notificacion['id'];
    $sql = "INSERT into tbl_movil_notificaciones (titulo,descripcion,fecha,remitente,segmento_id,tipo_notificacion_id,image_enable) VALUES ('$titulo','$contenido','$fecha_publicacion','ADMIN',$segmento,$tipo_notificacion,0)";
    $resultado = $mysqli->query($sql);
    if($resultado === TRUE){
    bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'INSERTO',strtoupper("$sql"));
    array_push($datos, ["idLote"=>(int)$id]);
    array_push($datos, ["titulo"=>$titulo]);
    array_push($datos, ["contenido"=>$contenido]);
    array_push($datos, ["urlRecurso"=>0]);
    array_push($datos, ["segmento"=>(int)$segmento]);
    $response = consumoApi($url, $datos);

        }else{
            echo 'no se pudo realizar la operacion';
        }
        
}
