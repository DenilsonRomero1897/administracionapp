<?php

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
//require_once('../Modelos/movil_segmentos_modelo.php');

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
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INGRESO', 'A GESTION DE PARAMETROS ');
}

// /* Esta condicion sirve para  verificar el valor que se esta enviando al momento de dar click en el icono modicar */
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM tbl_movil_parametros WHERE id = '$id'";
  $resultado = $mysqli->query($sql);
  //     /* Manda a llamar la fila */
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $id = $row['id'];
  $_SESSION['txtparametro'] = $row['parametro'];
  $_SESSION['txtDescripcion'] = $row['descripcion'];
  $_SESSION['txtvalor'] = $row['valor'];
 
  if (isset($_SESSION['txtparametro'])) {

?>
    <script>
      $(function() {
        $('#modal_modificar_parametros').modal('toggle')
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
                       text:"Lo sentimos el Parametro ya existe",
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
            <h1>Gestión de Parámetros</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_menu_gestion_vista.php">Gestión App</a></li>
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
          <a class="btn btn-primary btn-xs" href="../vistas/movil_crear_parametros_vista.php">Nuevo</a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" onclick="ventana()" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
     
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>PARAMETRO</th>
              <th>DESCRIPCIÓN</th>
              <th>VALOR</th>
              <th>FECHA DE MODIFICACION</th>
              <th>MODIFICADO POR</th>
              <th>USUARIO ID</th>
              <th>EDITAR</th>
              <th>ELIMINAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_parametros = "select * from tbl_movil_parametros";
            $resultado_parametros = $mysqli->query($sql_parametros);
            while ($parametro = $resultado_parametros->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $parametro['id']; ?></td>
                <td><?php echo $parametro['parametro']; ?></td>
                <td><?php echo $parametro['descripcion']; ?></td>
                <td><?php echo $parametro['valor']; ?></td>
                <td><?php echo $parametro['fecha_modificacion']; ?></td>
                <td><?php echo $parametro['modificado por']; ?></td>
                <td><?php echo $parametro['usuario_id']; ?></td>

                <td style="text-align: center;">
                  <a href="../vistas/movil_gestion_parametros_vista.php?&id=<?php echo $parametro['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>
                <td style="text-align: center;">
                  <form action="../Controlador/movil_guardar_parametros_controlador.php?id=<?php echo $parametro['id']; ?>" method="POST" class="FormularioAjax" data-form="delete" autocomplete="off" >
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
    </div>
  </div>
  <form action="../Controlador/movil_guardar_parametros_controlador.php?op=editar&id=<?php echo $id ?>" method="post" data-form="update" autocomplete="off">

    <div class="modal fade" id="modal_modificar_parametros">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modificar Parametro</h4>
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
                    <label>Parametro</label>
                    <input class="form-control" type="text" id="parametro" name="parametro" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtparametro']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Descripcion</label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtDescripcion']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Valor</label>
                    <input class="form-control" type="text" id="valor" name="valor" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtvalor']; ?>">
                  </div>
                  </div>
              </div>
            </div>
          <!--Footer del modal-->
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btn_modificar_parametros" name="btn_modificar_parametros">Guardar Cambios</button>
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
      window.open("../Controlador/movil_reporte_parametros_controlador.php", "REPORTE");
    }
  </script>
</body>

</html>