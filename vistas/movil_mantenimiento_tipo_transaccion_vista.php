<?php

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/conexion_mantenimientos.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
/*require_once('../Modelos/movil_segmentos_modelo.php');*/


$Id_objeto = 128;
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
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INGRESO', 'MANTENIMIENTO TIPO TRANSACCION');
}

// /* Esta condicion sirve para  verificar el valor que se esta enviando al momento de dar click en el icono modicar */
if (isset($_GET['id'])) {
  $sql_tipotransaccion = "SELECT * FROM tbl_movil_tipo_transacciones";
  $resultado_tipotransaccion = $mysqli->query($sql_tipotransaccion);

  $id = $_GET['id'];


  //  /* Hace un select para mandar a traer todos los datos de la 
  //  tabla donde rol sea igual al que se ingreso e el input */
  $sql = "SELECT * FROM tbl_movil_tipo_transacciones WHERE id = '$id'";
  $resultado = $mysqli->query($sql);
  //     /* Manda a llamar la fila */
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $id = $row['id'];
  $_SESSION['txtdescripcion'] = $row['descripcion'];
  $_SESSION['txtexternal_id'] = $row['external_id'];
  
 

  if (isset($_SESSION['txtdescripcion'])) {


?>
    <script>
      $(function() {
        $('#modal_modificar_tipotransaccion').modal('toggle')
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
                       text:"Lo sentimos el Tipo Transaccion ya existe",
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
ob_end_flush();


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
            <h1>Mantenimiento Tipo Transacción</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="../vistas/movil_menu_mantenimiento_vista.php">Mantenimiento APP</a></li>
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
          <a class="btn btn-primary btn-xs" href="../vistas/movil_crear_tipo_transaccion_vista.php">Nuevo</a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" onclick="ventana()" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
      <div class="card-footer">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>DESCRIPCIÓN</th>
              <th>EXTERNAL_ID</th>
              <th>EDITAR</th>
              <th>BORRAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_tipotransaccion = "select * from  tbl_movil_tipo_transacciones";
            $resultado_tipotransaccion = $mysqli->query($sql_tipotransaccion);
            while ($transaccion = $resultado_tipotransaccion->fetch_array(MYSQLI_ASSOC)){ ?>
              <tr>
                <td><?php echo $transaccion['id']; ?></td>
                <td><?php echo $transaccion['descripcion']; ?></td>
                <td><?php echo $transaccion['external_id']; ?></td>
                

                <td style="text-align: center;">

                  <a href="../vistas/movil_mantenimiento_tipo_transaccion_vista.php?&id=<?php echo $transaccion['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                  <form action="../Controlador/movil_guardar_tipotransaccion_controlador.php?op=eliminar&id=<?php echo $transaccion['id']; ?>" method="POST" class="FormularioAjax" data-form="delete" autocomplete="off">
                    <button type="submit" class="btn btn-danger btn-raised btn-xs">
                      <i class="far fa-trash-alt"></i>
                    </button>
                    <div class="RespuestaAjax"></div>
                  </form>
                </td>

              </tr>

            <?php } ?>

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
  </div>
  </div>
  </section>

  </div>
  <form action="../Controlador/movil_guardar_tipotransaccion_controlador.php?op=editar&id=<?php echo $id ?>" method="post" data-form="update" autocomplete="off">
    <div class="modal fade" id="modal_modificar_tipotransaccion">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modificar Tipo Transacción </h4>
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
                    <label>Descripción del tipo Transaccion </label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtdescripcion']; ?>">
                  </div>
                  <div class="form-group">
                    <label>External ID</label>
                    <input class="form-control" type="text" id="external_id" name="external_id" style="text-transform: uppercase" onkeypress=" " onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtexternal_id']; ?>">    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--Footer del modal-->
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btn_modificar_tipotransaccion" name="btn_modificar_tipotransaccion">Guardar Cambios</button>
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
      window.open("../Controlador/movil_reporte_tipo_transaccion_controlador.php", "REPORTE");
    }
  </script>
</body>

</html>