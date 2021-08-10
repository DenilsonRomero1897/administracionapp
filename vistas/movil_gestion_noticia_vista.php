<?php

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');

$Id_objeto = 123;
$visualizacion = permiso_ver($Id_objeto);

//DATOS PARA EL PDF
$sql2 = "SELECT n.id, n.titulo, n.subtitulo, n.descripcion, n.fecha, n.fecha_vencimiento, n.remitente,
s.nombre FROM tbl_movil_noticias n
INNER JOIN tbl_movil_segmentos s ON n.segmento_id = s.id";
$query = $mysqli->query($sql2);
$clientes = array();
$cont = 0;
while ($r = $query->fetch_object()) {
  $clientes[] = $r;
  $cont++;
}


if ($visualizacion == 0) {
  echo '<script type="text/javascript">
  swal({
        title:"",
        text:"Lo sentimos no tiene permiso de visualizar la pantalla",
        type: "error",
        showConfirmButton: false,
        timer: 3000
      });
  window.location = "../vistas/pagina_principal_vista.php";
   </script>';
} else {
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INGRESO', 'A GESTION DE NOTICIAS ');
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM tbl_movil_noticias WHERE id = '$id'";
  $resultado = $mysqli->query($sql);
  //     /* Manda a llamar la fila */
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $id = $row['id'];
  $_SESSION['txtTitulo'] = $row['titulo'];
  $_SESSION['txtSubtitulo'] = $row['subtitulo'];
  $_SESSION['txtDescripcion'] = $row['descripcion'];
  $_SESSION['txtFecha'] = strtotime($row['fecha']);
  $_SESSION['txtFecha_vencimiento'] = strtotime($row['fecha_vencimiento']);
  $_SESSION['txtSegmento_id'] = $row['segmento_id'];


  if (isset($_SESSION['txtTitulo'])) {

?>

    <script>
      $(function() {
        $('#modal_modificar_noticia').modal('toggle')
      })
    </script>;

<?php

  }
}

if (isset($_REQUEST['msj'])) {
  $msj = $_REQUEST['msj'];

  if ($msj == 1) {
    echo '<script type="text/javascript">
                    swal({
                       title:"",
                       text:"Lo sentimos el segmento ya existe",
                       type: "info",
                       showConfirmButton: false,
                       timer: 3000
                        });
                </script>';
  }
  if ($msj == 2) {
    echo '<script type="text/javascript">
                    swal({
                       title:"",
                       text:"Los datos se almacenaron correctamente",
                       type: "success",
                       showConfirmButton: false,
                       timer: 3000
                        });
                </script>';
  }
  if ($msj == 3) {
    echo '<script type="text/javascript">
                    swal({
                       title:"",
                       text:"Lo sentimos tiene campos por rellenar.",
                       type: "error",
                       showConfirmButton: false,
                       timer: 3000
                    });
                </script>';
  }
  if ($msj == 4) {
    echo '<script type="text/javascript">
                    swal({
                       title:"",
                       text:"los datos se eliminaron correctamente.",
                       type: "error",
                       showConfirmButton: false,
                       timer: 3000
                    });
                </script>';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title></title>

</head>

<body onload="readProducts()">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión Noticias</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="../vistas/movil_menu_noticias_vista.php">Menú de Noticias</a></li>
            </ol>
          </div>

          <div class="RespuestaAjax"></div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!--Pantalla 2-->
    <div class="card card-default">
      <div class="card-header">
        <div class="card-tools">
          <a class="btn btn-primary btn-xs" href="../vistas/movil_crear_noticia_vista.php">Nuevo</a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <div class="dt-buttons btn-group"><button id="GenerarReporte" class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
        <div>
          <div class="card-body" id="Noticias">

          </div><!-- /.card-body -->
        </div>
      </div>
      <form action="../Controlador/movil_noticia_controlador.php?op=editar&id=<?php echo $id ?>" method="post" data-form="update" autocomplete="off">

        <div class="modal fade" id="modal_modificar_noticia">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modificar Noticia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Cuerpo del modal-->
              <div class="modal-body">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="form-group">
                        <label for="titulo"> Título:</label>
                        <input autofocus class="form-control" type="text" value="<?php echo $_SESSION['txtTitulo'] ?>" maxlength="45" id="titulo" name="titulo" required style="text-transform: uppercase" onpaste="return false" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                      </div>

                      <div class="form-group">
                        <label for="subtitulo"> Subtítulo:</label>
                        <input autofocus class="form-control" type="text" value="<?php echo $_SESSION['txtSubtitulo'] ?>" maxlength="45" id="subtitulo" name="subtitulo" required style="text-transform: uppercase" onpaste="return false" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                      </div>

                      <div class="form-group">
                        <label for="Contenido">Contenido:</label>
                        <input class="form-control" type="text" value="<?php echo $_SESSION['txtDescripcion'] ?>" maxlength="255" id="Contenido" name="Contenido" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                      </div>

                      <div class="form-group">
                        <label>Segmentos: </label>
                        <select class="form-control" name="Segmentos" id="Segmentos">
                          <option value="">Seleccione una opción :</option>
                          <?php
                          $sql_segmentos = "SELECT id,nombre FROM tbl_movil_segmentos";
                          $resultado_segmentos = $mysqli->query($sql_segmentos);
                          while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { ?>
                            <?php if ($segmento['id'] == $_SESSION['txtSegmento_id']) { ?>
                              <option selected value="<?php echo $segmento['id'] ?>"><?php echo $segmento['nombre'] ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $segmento['id'] ?>"><?php echo $segmento['nombre'] ?></option>
                          <?php }
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <!-- FECHA DE PUBLICACION txt_fecha_Publicacion -->
                        <label for="txt_fecha_Publicacion">Fecha y Hora de Publicación:</label>
                        <?php echo date("d-m-Y\ H:m", $_SESSION['txtFecha']) ?>
                        <input class="form-control" type="datetime-local" id="txt_fecha_Publicacion" name="txt_fecha_Publicacion" value="<?php echo date("Y-m-d H:i", $_SESSION['txtFecha']) ?>" onkeydown="return false">
                      </div>
                      <div class="form-group">
                        <!-- FECHA DE PUBLICACION txt_fecha_Publicacion -->
                        <label for="txt_fecha_vencimiento">Fecha y Hora de Vencimiento:</label>
                        <?php echo date("Y-m-d\ H:i", $_SESSION['txtFecha_vencimiento']) ?>
                        <input class="form-control" type="datetime-local" id="txt_fecha_vencimiento" name="txt_fecha_vencimiento" value="<?php echo $_SESSION['txtFecha_vencimiento'] ?> " onkeydown="return false">
                      </div>
                      <div class="form-group">
                        <!-- archivos adjuntos -->
                        <label for="archivos_subidos">Archivos Adjuntos:</label>
                        <div id="table-archivos-adjuntos">

                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <!--Footer del modal-->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary" id="btn_modificar_segmento" name="btn_modificar_segmento">Guardar Cambios</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <!-- /.  finaldel modal -->



      </form>

      <script>
        function ventana() {
          window.open("../Controlador/movil_reporte_gestion_noticia.php", "REPORTE");
        }

        function readProducts() {
          var parametro;
          $.ajax({
            data: parametro, //datos que se envian a traves de ajax
            url: '../Controlador/movil_listar_noticias_controlador.php', //archivo que recibe la peticion
            type: 'POST', //método de envio
            beforeSend: function() {
              $('#Noticias').html("Procesando, espere por favor...");
            },
            success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              $('#Noticias').html(response);
            }
          });
        }

        function eliminar(id) {
          var parametro = {
            'funcion': 'eliminar',
            'id': id
          }
          var confirmacion = confirm('esta seguro de eliminar');
          if (confirmacion) {
            $.ajax({
              data: parametro, //datos que se envian a traves de ajax
              url: '../Controlador/movil_noticia_controlador.php', //archivo que recibe la peticion
              type: 'POST', //método de envio
              success: function(data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                console.log(data);
                if (data != '') {
                  readProducts();
                  datoseliminados();
                } else {
                  alert('no se pudo eliminar!!');
                }

              }
            });
          } else {
            console.log('decidio no eliminar');
          }
        }

        function datoseliminados() {
          swal({
            title: "",
            text: "los datos se eliminaron correctamente.",
            type: "success",
            showConfirmButton: true,
            timer: 3000
          });
        }
        var arrayJS = <?php echo json_encode($clientes) ?>;
        $("#GenerarReporte").click(function() {
          var pdf = new jsPDF('landscape');
          var logo = new Image();
          logo.src = '../dist/img/logo_ia.jpg';
          pdf.addImage(logo, 15, 10, 30, 30);
          pdf.setFont('Arial',);
          pdf.setFontSize(12);
          pdf.text(90, 15, "UNIVERSIDAD NACIONAL AUTÓNOMA DE HONDURAS");
          pdf.text(70, 23, "FACULTAD DE CIENCIAS ECONÓMICAS, ADMINISTRATIVAS Y CONTABLES");
          pdf.text(105, 30, "DEPARTAMENTO DE INFORMÁTICA ");
          pdf.setFont('Arial','B');
          pdf.setFontSize(14);
          pdf.text(115, 38, "REPORTE DE NOTICIAS");
          var columns = ["#", "Titulo", "Subtitulo", "Contenido", "Fecha de Publicación", "Fecha de Vencimiento", "Remitente", "Segmento"];
          var data = [];
          for (var i = 0; i < arrayJS.length; i++) {
            data.push([i + 1, arrayJS[i]['titulo'], arrayJS[i]['subtitulo'], arrayJS[i]['descripcion'], arrayJS[i]['fecha'], arrayJS[i]['fecha_vencimiento'], arrayJS[i]['remitente'], arrayJS[i]['nombre']]);
          }

          pdf.autoTable(columns, data, {
            margin: {
              top: 45
            }
          });
       
          pdf.save('ReporteNoticia.pdf');

        });
      </script>

</body>

</html>