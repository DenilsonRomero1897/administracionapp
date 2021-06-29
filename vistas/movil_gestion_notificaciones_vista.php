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


<body>


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
        <h3 class="card-title">Notificaciones</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>TITULO</th>
<<<<<<< Updated upstream
              <th>DESCRIPCIÓN</th>
              <th>FECHA Y HORA</th>
=======
              <th>DESCRIPCION</th>
              <th>FECHA</th>
>>>>>>> Stashed changes
              <th>SEGMENTO</th>
              <th>TIPO NOTIFICACIÓN</th>
              <th>EDITAR</th>
              <th>ELIMINAR</th>
              <th hidden>IMAGEN ENABLE</th>
            </tr>
          </thead>
          <tbody>
          <!--aqui debemos colocar los td-->
          <?php
               $sql="SELECT * FROM tbl_movil_notificaciones";  
               $resultado_notificaciones = $mysqli->query($sql);
            while ($fila = $resultado_notificaciones->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['titulo']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['segmento_id']; ?></td>
                <td><?php echo $fila['tipo_notificacion_id']; ?></td>

                <td style="text-align: center;">

                  <a href="../vistas/movil_gestion_notificaciones_vista.php?&id=<?php echo $fila['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                  <form action="../Controlador/movil_segmentos_controlador.php?op=eliminar&id=<?php echo $segmento['id']; ?>" method="POST" class="FormularioAjax" data-form="delete" autocomplete="off">
                    <button type="submit" class="btn btn-danger btn-raised btn-xs">
                      <i class="far fa-trash-alt"></i>
                    </button>
                  </form>
                </td>

              </tr>

            <?php } ?>

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
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
                <label>Segmento</label>

                <input class="form-control" type="text" id="nombre" name="nombre" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtNombre']; ?>">

              </div>

              <div class="form-group">
                <label>Descripcion</label>

                <input class="form-control" type="text" id="descripcion" name="descripcion" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtDescripcion']; ?>">

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



  </section>

  </div>


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
      });
    });
  </script>
</body>

</html>