<?php
session_start();

require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once("../Modelos/movil_noticia_modelo.php");
require_once("../Controlador/movil_api_controlador.php");


if (isset($_GET['op'])) {
    $url ='http://localhost/apiAppInformatica/modulos/envioNotificaciones.php';
    $datos = [];
    switch ($_GET['op']) {
    
        case 'insert':
            $modelo = new modelo_registro_noticia();
            $titulo = isset($_POST['titulo']) ? strtoupper($_POST['titulo']) : '';
            $contenido = isset($_POST['Contenido']) ? strtoupper($_POST['Contenido']) : '';
            $segmento = isset($_POST['Segmentos']) ? $_POST['Segmentos'] : '';
            $fecha_publicacion = date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_Publicacion']));
            $fecha_vencimiento= date('Y-m-d H:i:s',strtotime($_POST['txt_fecha_vencimiento']));
            $sql = "INSERT into tbl_movil_noticias (titulo,descripcion,fecha,fecha_vencimiento,remitente,segmento_id) VALUES ('$titulo','$contenido','$fecha_publicacion','$fecha_vencimiento','ADMIN',$segmento)";
            $resultado = $mysqli->query($sql);
                if($resultado === TRUE){
                    $idNoticia = $modelo->buscar_id_noticia($titulo,$fecha_publicacion);
                    $i = 0;
                    foreach ($_FILES['txt_documentos'] as $item){
                        $idRecurso = subirDocumentos($i);
                        $modelo->insert_noticia_recurso((int)$idNoticia['id'],(int)$idRecurso['id']); 
                        $i += 1;
                    }
                    bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto,'INSERTO',strtoupper("$sql"));
                    
                    //Llenado del arreglo
                    array_push($datos, ["id"=>$id]);
                    array_push($datos, ["titulo"=>$titulo]);
                    array_push($datos, ["contenido"=>$contenido]);
                    array_push($datos, ["segmento_id"=>$segmento]);
                    array_push($datos, ["fecha"=>$fecha_publicacion]);
                    array_push($datos, ["fecha_vencimiento"=>$fecha_vencimiento]);
                    array_push($datos, ["url"=>$url]);
    
                    $response =consumoApi($url, $datos);
                    
                    header('location: ../vistas/movil_gestion_noticia_vista.php?msj=2');
                    
                
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
    
    function subirDocumentos($i){
    
        $MP = new modelo_registro_noticia();
        //$nombrearchivo = htmlspecialchars($_POST['txt_documentos']['name']['0'],ENT_QUOTES,'UTF-8');
        $tmp_name = $_FILES['txt_documentos']['tmp_name']["$i"];
        $name = $_FILES['txt_documentos']['name']["$i"];
        if(is_array($_FILES) && count($_FILES)>0){
            if(move_uploaded_file($tmp_name,"../archivos/movil/".$name)){
              $nombrearchivo= '../archivos/movil/'.$name;
              $MP->Registrar_foto($nombrearchivo);  
              $idRecurso = $MP->buscar_id_recurso($nombrearchivo);
              return $idRecurso;
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }
}


if (isset($_POST['funcion'])) {
    if ($_POST['funcion']=='eliminar') {
        $id = (int)$_POST['id'];
                //se ejecuta el sql respectivo
                $sql = "DELETE FROM tbl_movil_noticias where id = $id";
                $resultado = $mysqli->query($sql);
                if ($resultado) {
                    echo 'hola mundo';
                }else{
                    echo '';
                }
    }
}

?>