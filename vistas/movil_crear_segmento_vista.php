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

bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'Ingreso', 'A Crear Segmentos');

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
            <h1>Nuevo Segmento</h1>
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
        <form action="../Controlador/movil_segmentos_controlador.php" method="POST">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Crear Nuevo Segmento</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nombre"> Nombre del segmento</label>
                    <input autofocus class="form-control" type="text" maxlength="45" id="nombre" name="nombre" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input class="form-control" type="text" maxlength="200" id="descripcion" name="descripcion" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Tipo de Persona: </label>
                <select class="form-control" name="buscar_tipo_persona" id="buscar_tipo_persona" value="">
                  <option value="">Seleccione una opción :</option>
                  <?php
                  $sql_tipo_persona = "SELECT id_tipo_persona,tipo_persona FROM tbl_tipos_persona";
                  $resultado_tipo_persona = $mysqli->query($sql_tipo_persona);
                  while ($tipo_persona = $resultado_tipo_persona->fetch_array(MYSQLI_ASSOC)) { ?>
                    <option value="<?php echo $tipo_persona['id_tipo_persona'] ?>" onclick="realizarproceso(<?php echo $tipo_persona['id_tipo_persona'] ?>)"><?php echo $tipo_persona['tipo_persona'] ?></option>
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
                    <th>SELECCIONAR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_segmentos = "SELECT id_persona,nombres,apellidos FROM tbl_personas";
                  $resultado_segmentos = $mysqli->query($sql_segmentos);
                  while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td hidden><?php echo $segmento['id_persona']; ?></td>
                      <td><?php echo $segmento['nombres']; ?></td>
                      <td><?php echo $segmento['apellidos']; ?></td>
                      <td style="text-align: center;">
                        <input type="checkbox" class="" name="persona" value="<?php echo $segmento['id_persona']; ?>"><br>
                        </a>
                      </td>

                    <?php } ?>
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
function realizaProceso(valorCaja1){
        var parametros = {
                "valorCaja1" : valorCaja1,
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   '', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultado").html(response);
                }
        });
}
</script>
</body>

</html>