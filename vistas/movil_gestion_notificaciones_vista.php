<?php

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');

$Id_objeto = 123;
$visualizacion = permiso_ver($Id_objeto);
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
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INGRESO', 'A GESTION DE NOTIFICACIONES ');
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM tbl_movil_notificaciones WHERE id = '$id'";
  $resultado = $mysqli->query($sql);
  //     /* Manda a llamar la fila */
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $id = $row['id'];
  $_SESSION['txtTitulo'] = $row['titulo'];
  $_SESSION['txtDescripcion'] = $row['descripcion'];
  $_SESSION['txtFecha'] = $row['fecha'];
  $_SESSION['txtSegmento_id'] = $row['segmento_id'];
  $_SESSION['txtTipoNotificacionId'] = $row['tipo_notificacion_id'];

  if (isset($_SESSION['txtTitulo'])) {

?>

    <script>
      $(function() {
        $('#modal_modificar_notificacion').modal('toggle')
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
            <h1>Gestión de Notificaciones</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_crear_notificacion_vista.php">Nueva Notificacion</a></li>
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
          <a class="btn btn-primary btn-xs" href="../vistas/movil_crear_notificacion_vista.php">Nuevo</a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" onclick="ventana()" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
      </div>
      <div class="card-body" id="Notificaciones">
        
      </div><!-- /.card-body -->
    </div>
  </div>
  <form action="../Controlador/movil_notificacion_controlador.php?op=editar&id=<?php echo $id ?>" method="post" data-form="update" autocomplete="off">

    <div class="modal fade" id="modal_modificar_notificacion">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modificar Notificacion</h4>
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
                    <input autofocus class="form-control" type="text" value="<?php echo $_SESSION['txtTitulo'] ?>" maxlength="45" id="titulo" name="titulo" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
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
                    <label>Tipo Notificacion: </label>
                    <select class="form-control" name="tipo_notificacion" id="tipo_notificacion">
                      <option value="">Seleccione una opción :</option>
                      <?php
                      $sql_tn = "SELECT id,descripcion FROM tbl_movil_tipo_notificaciones";
                      $resultado_tn = $mysqli->query($sql_tn);
                      while ($fila = $resultado_tn->fetch_array(MYSQLI_ASSOC)) { ?>
                        <?php if ($fila['id'] == $_SESSION['txtTipoNotificacionId']) { ?>
                          <option selected value="<?php echo $fila['id'] ?>"><?php echo $fila['descripcion'] ?></option>
                        <?php } else { ?>
                          <option value="<?php echo $fila['id'] ?>"><?php echo $fila['descripcion'] ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <!-- FECHA DE PUBLICACION txt_fecha_Publicacion -->
                    <label for="txt_fecha_Publicacion">Fecha y Hora de Publicación:</label>
                    <input class="form-control" type="datetime-local" id="txt_fecha_Publicacion" name="txt_fecha_Publicacion" required onkeydown="return false">

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

  <script type="text/javascript">
    $(function() {
      $('#tabla').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
      });
    });
    
    function ventana() {
      window.open("../Controlador/movil_reporte_notificaciones.php", "REPORTE");
    }

    function readProducts() {
      var parametro;
      $.ajax({
        data: parametro, //datos que se envian a traves de ajax
        url: '../Controlador/movil_listar_notificaciones_controlador.php', //archivo que recibe la peticion
        type: 'POST', //método de envio
        beforeSend: function() {
          $('#Notificaciones').html("Procesando, espere por favor...");
        },
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $('#Notificaciones').html(response);
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
          url: '../Controlador/movil_notificacion_controlador.php', //archivo que recibe la peticion
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

    function datoseliminados(){
                    swal({
                       title:"",
                       text:"los datos se eliminaron correctamente.",
                       type: "success",
                       showConfirmButton: true,
                       timer: 3000
                    });
                  }
  </script>

</body>

</html>