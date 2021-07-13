<?php 
require_once ('../clases/Conexion.php');
require_once ('../clases/funcion_permisos.php');
require_once ('../clases/funcion_bitacora_movil.php');




$id_segmento = isset($_GET["id"]) ? ((int)$_GET["id"]) : "";

$Id_objeto=127;

// if () {
///Logica para el que se repite
//$sqlexiste = ("select count(nombre) as nombre  from tbl_movil_segmentos where nombre='$nombre'");
//Obtener la fila del query
//$existe = mysqli_fetch_assoc($mysqli->query($sqlexiste));
//   echo '<script type="text/javascript">
//                               swal({
//                                    title:"",
//                                    text:"Lo sentimos no tiene permiso para eliminar",
//                                    type: "error",
//                                    showConfirmButton: false,
//                                    timer: 3000
//                                 });
//                                 $(".FormularioAjax")[0].reset();
//                                                window.location = "../vistas/movil_gestion_segmentos_vista.php";

//                             </script>';
// }
// else
// {




   $sql = "DELETE FROM tbl_movil_segmentos WHERE id = $id_segmento";
   $resultado = $mysqli->query($sql);
	if($resultado === TRUE){
        bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'ELIMINO', strtoupper("$sql"));
                        	echo '<script type="text/javascript">
                              swal({
                                   title:"",
                                   text:"Los datos  se eliminaron correctamente",
                                   type: "success",
                                   showConfirmButton: false,
                                   timer: 3000
                                });
                                $(".FormularioAjax")[0].reset();
               window.location = "../vistas/movil_gestion_segmentos_vista.php";

                            </script>'
                            ;                      

                        }else{
                        	echo '<script type="text/javascript">
                                    swal({
                                       title:"",
                                       text:"No se realizo el proceso, el registro a eliminar tiene datos en otras tablas",
                                       type: "error",
                                       showConfirmButton: false,
                                       timer: 1500
                                    });
                                     $(".FormularioAjax")[0].reset();
                                </script>';
                        }
//}
