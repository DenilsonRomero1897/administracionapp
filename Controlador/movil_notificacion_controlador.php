<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../Controlador/movil_api_controlador.php');
require_once('../Controlador/movil_transacciones_controlador.php');
require_once("../Modelos/movil_notificaciones_modelo.php");

if (isset($_GET['op'])) {
$url ='https://apiappinfomatica.000webhostapp.com/modulos/notificaciones/envioNotificaciones.php';
$datos = array();
$Id_objeto = 127;
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
        $image = subirDocumentos();
        
        $sql = "INSERT into tbl_movil_notificaciones  VALUES (null,'$titulo','$contenido','$fecha_publicacion','ADMIN',$segmento,$tipo_notificacion,'$image')";
        $resultado = $mysqli->query($sql);
            if($resultado === TRUE){
                bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'INSERTO',strtoupper("$sql"));
                
                 //Llenado del arreglo
                $id_usuario = $_SESSION['id_usuario'];
                $sql = "SELECT Usuario,contrasena FROM tbl_usuarios WHERE Id_usuario = $id_usuario";
                $resultado = $mysqli->query($sql)->fetch_assoc();
                $usuario = $resultado['Usuario'];
                $password = $resultado['contrasena'];
                //traer el id de la notificacion insertada
                $sql_id = "SELECT id FROM tbl_movil_notificaciones WHERE fecha = '$fecha_publicacion'";
                $rspta = $mysqli->query($sql_id);
                $row = $rspta->fetch_assoc();
                $id_notificacion = (int)$row['id'];
                //subir imagen de la notificacion 
                $datos = array("idLote" => $id_notificacion,
                                 "usuario" => $usuario,
                                 "password" => $password,
                                 "titulo" => $titulo,
                                 "contenido" => $contenido,
                                 "urlRecurso" => $image,
                                 "segmento" => $segmento);
                $response = consumoApi($url, $datos);
                $response2 = $response['mensaje'];
                $sql = "INSERT INTO tbl_movil_transacciones values (null,sysdate(),'envio de notificaciones','$response2','completada')";
                $resultado = $mysqli->query($sql);
                header('location: ../vistas/movil_gestion_notificaciones_vista.php?msj=2');
            }
        break;
        
    case 'editar':
        $id = $_GET['id'];
        $titulo = isset($_POST['titulo']) ? strtoupper($_POST['titulo']) : '';
        $contenido = isset($_POST['Contenido']) ? strtoupper($_POST['Contenido']) : '';
        $segmento = $_POST['Segmentos'];
        $tipo_notificacion = $_POST['tipo_notificacion'];
        $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
        $sql = "UPDATE tbl_movil_notificaciones SET titulo = '$titulo', descripcion = '$contenido', fecha = '$fecha_publicacion', remitente = 'ADMIN', segmento_id = $segmento, tipo_notificacion_id = $tipo_notificacion where id = $id";
        $resultado = $mysqli->query($sql);
            if($resultado){
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
                bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'ELIMINO',strtoupper("$sql"));
                if ($resultado) {
                    
                    echo 'hola mundo';
                }else{
                    echo '';
                }
    }
}


function subirDocumentos(){
    $tmp_name = $_FILES['subir_archivo']['tmp_name'];
    $name = $_FILES['subir_archivo']['name'];
    if(is_array($_FILES) && count($_FILES) > 0){
        if(move_uploaded_file($tmp_name,"../archivos/movil/notificacion/".$name)){
          $nombrearchivo= '../archivos/movil/notificacion/'.$name;
          return $nombrearchivo;
        }else{
            echo 0;
        }
    }else{
        return $nombrearchivo = "NULL";
    }
}
