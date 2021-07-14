<?php

ob_start();

session_start();

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/conexion_mantenimientos.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
/*require_once('../Modelos/movil_segmentos_modelo.php');*/
////////////////declaracion de variables para la busqueda//////////

$Id_objeto = 125;

bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'Ingreso', 'A llenar Segmento');

$visualizacion = permiso_ver($Id_objeto);
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
                       text:"Los datos  se almacenaron correctamente",
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
}
// if ($visualizacion == 0) {
//   echo '<script type="text/javascript">
//                               swal({
//                                    title:"",
//                                    text:"Lo sentimos no tiene permiso de visualizar la pantalla",
//                                    type: "error",
//                                    showConfirmButton: false,
//                                    timer: 3000
//                                 });
//                            window.location = "../vistas/menu_usuarios_vista.php";

//                             </script>';
//   // header('location:  ../vistas/menu_usuarios_vista.php');
// } else {

//   if (permisos::permiso_insertar($Id_objeto) == '1') {
//     $_SESSION['btn_guardar_segmentos'] = "";
//   } else {
//     $_SESSION['btn_guardar_segmentos'] = "disabled";
//   }
// }

ob_end_flush();

?>

<!DOCTYPE html>
<html>

<head>
  <title></title>
  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script type="text/javascript">
  </script>
</head>

<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Llenando Segmento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_menu_segmentos_vista.php">Segmentos</a></li>
            </ol>
          </div>
          <div class="RespuestaAjax"></div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- pantalla 1 -->
        <form action="../Controlador/movil_segmento_persona_controlador.php" method="POST">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Registro Segmento</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                <label>Segmento: </label>
                <select class="form-control" name="Segmento" id="Segmento" required>
                  <option value="">Seleccione un segmento:</option>
                  <?php 
                  $sql_segmentos = "SELECT id,nombre FROM tbl_movil_segmentos";
                  $resultado_segmentos = $mysqli->query($sql_segmentos);
                  while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $segmento['id'] ?>"><?php echo $segmento['nombre'] ?></option>
                  <?php } ?>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label>Tipo de Persona: </label>
                <select class="form-control" name="buscar_tipo_persona" id="buscar_tipo_persona" onchange="realizaProceso()">
                  <option value="">Seleccione una opción :</option>
                  <?php
                  $sql_tipo_persona = "SELECT id_tipo_persona,tipo_persona FROM tbl_tipos_persona";
                  $resultado_tipo_persona = $mysqli->query($sql_tipo_persona);
                  while ($tipo_persona = $resultado_tipo_persona->fetch_array(MYSQLI_ASSOC)) { ?>
                    <option value="<?php echo $tipo_persona['id_tipo_persona'] ?>"><?php echo $tipo_persona['tipo_persona'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabla" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th hidden>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>SELECCIONAR <input type="checkbox" class="ml-2" name="marcar_todos" id="marcar_todos" onclick="toggle(this)"></th>
                  </tr>
                </thead>
                <tbody id="resultado">
                  
                </tbody>
              </table>
            </div>
            <p class="text-center" style="margin-top: 20px;">
              <button type="submit" class="btn btn-primary" id="btn_guardar_segmentos" name="btn_guardar_segmentos"><i class="zmdi zmdi-floppy"></i>Guardar</button>
            </p>
        </form>
      </div>
    </section>


  </div>
  <script>
    function realizaProceso() {
      var tipo_persona = document.getElementById('buscar_tipo_persona').value;
      var parametros = {
        "tipoPersona": tipo_persona
      }
      $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../Controlador/movil_buscar_personas_controlador.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function() {
          $("#resultado").html("Procesando, espere por favor...");
        },
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $("#resultado").html(response);
        }
      });
    }

    function toggle(source) {
      checkboxes = document.getElementsByName('persona');
      for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
      }

    }
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
   
  </script>

</body>

</html>