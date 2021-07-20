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
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INGRESO', 'GESTION DE TRANSACCIONES');
}

// /* Esta condicion sirve para  verificar el valor que se esta enviando al momento de dar click en el icono modicar */
if (isset($_GET['id'])) {
  $sql_transacciones = "SELECT * FROM tbl_movil_transacciones";
  $resultado_transacciones= $mysqli->query($sql_transacciones);

  $id = $_GET['id'];


  //  /* Hace un select para mandar a traer todos los datos de la 
  //  tabla donde rol sea igual al que se ingreso e el input */
  $sql = "SELECT * FROM tbl_movil_transacciones WHERE id = '$id'";
  $resultado = $mysqli->query($sql);
  //     /* Manda a llamar la fila */
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $id = $row['id'];
  $_SESSION['txtfecha_envio'] = $row['fecha_envio'];
  $_SESSION['txtrequest_envio'] = $row['request_envio'];
  $_SESSION['txtresponse'] = $row[' response'];
  $_SESSION['txtestado'] = $row['estado'];
  $_SESSION['txtTipotransaccion'] = $row['tipo_transaccion_id'];


  if (isset($_SESSION['txtfecha_envio'])) {


?>
    <script>
      $(function() {
        $('#modal_modificar_transacciones').modal('toggle')
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
            <h1>Gestion de Transacciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="../vistas/movil_menu_gestion_vista.php">Gestión APP</a></li>
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
          <a class="btn btn-primary btn-xs" href="../vistas/movil_crear_transaccion_vista.php">Nuevo</a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" onclick="ventana()" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
     
        <div class="card-body">
            <table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>ID</th>
              <th>FECHA DE ENVIO</th>
              <th>REQUEST ENVIO</th>
              <th>RESPONSE</th>
              <th>ESTADO</th>
              <th>TIPO DE TRANSACCION </th>
              <th>EDITAR </th>
              <th>BORRAR </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql_transacciones= "select * from  tbl_movil_transacciones";
                $resultado_transacciones = $mysqli->query($sql_transacciones);
                while ($transacciones= $resultado_transacciones->fetch_array(MYSQLI_ASSOC)) { ?>
                  <tr>
                    <td><?php echo $transacciones['id']; ?></td>
                    <td><?php echo $transacciones['fecha_envio']; ?></td>
                    <td><?php echo $transacciones['request_envio']; ?></td>
                    <td><?php echo $transacciones[' response']; ?></td>
                    <td><?php echo $transacciones['estado']; ?></td>
                    <td><?php echo $transacciones['tipo_transaccion_id']; ?></td>
                  
                  
                    <td style="text-align: center;">
                      <a href="../vistas/movil_gestion_transacciones_vista.php?&id=<?php echo $transacciones['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                        <i class="far fa-edit"></i>
                      </a>
                    </td>
                    <td style="text-align: center;">
                      <form action="../Controlador/movil_guardar_transacciones_controlador.php?op=eliminar&id=<?php echo $transacciones['id']; ?>" method="POST" class="FormularioAjax" data-form="delete" autocomplete="off">
                        <button type="submit" class="btn btn-danger btn-raised btn-xs">
                          <i class="far fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- /.card-body -->
    </div>
  </div>
  <form action="../Controlador/movil_guardar_transacciones_controlador.php?op=editar&id=<?php echo $id ?>" method="post" data-form="update" autocomplete="off">
    <div class="modal fade" id="modal_modificar_transacciones">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modificar La transacción </h4>
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
                    <label>Fecha de Envio: </label>
                    <input class="form-control" type="datetime-local" id="fecha_envio" name="fecha_envio" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtfecha_envio']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Request de Envio: </label>
                    <input class="form-control" type="text" id="request_envio" name="request_envio" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtrequest_envio']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Response: </label>
                    <input class="form-control" type="text" id="response" name="response" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtresponse']; ?>">
                  </div>
                  <div class="form-group">
                    <label> Estado: </label>
                    <input class="form-control" type="text" id="estado" name="estado" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtestado']; ?>">
                  </div>
        
                  <div class="form-group">
                    <label>Tipo Transacción: </label>
                    <select class="form-control" name="tipo_transaccion_id" id="tipo_transaccion_id">
                      <option value="">Seleccione una opción :</option>
                      <?php
                      $sql_transacciones = "SELECT id,descripcion FROM tbl_movil_tipo_transacciones";
                      $resultado_transacciones = $mysqli->query($sql_transacciones);
                      while ($transacciones= $resultado_transacciones->fetch_array(MYSQLI_ASSOC)) { ?>
                        <?php if ($transacciones['id'] == $_SESSION['txtTipotransaccion']) { ?>
                          <option selected value="<?php echo $transacciones['id'] ?>"><?php echo $transacciones['descripcion'] ?></option>
                        <?php } else { ?>
                          <option value="<?php echo $transacciones['id'] ?>"><?php echo $transacciones['descripcion'] ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                    </div>
            </div>
          </div>
       </div>

          <!--Footer del modal-->
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btn_modificar_transacciones" name="btn_modificar_transacciones">Guardar Cambios</button>
          </div>
    </div>
    </div>
    </div>
   
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
      window.open("../Controlador/movil_reporte_transacciones_controlador.php", "REPORTE");
    }
  </script>
</body>

</html>