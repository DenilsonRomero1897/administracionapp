<?php

ob_start();


session_start();

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/conexion_mantenimientos.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
/*require_once('../Modelos/movil_segmentos_modelo.php');*/


$Id_objeto = 1;

bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto, 'Ingreso', 'A Crear Parametros');

$visualizacion = permiso_ver($Id_objeto);
if (isset($_REQUEST['msj'])) {
  $msj = $_REQUEST['msj'];

  if ($msj == 1) {
    echo '<script type="text/javascript">
                    swal({
                       title:"",
                       text:"Lo sentimos el tipo recurso  ya existe",
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
            <h1>Crear Nuevo Parámetro</h1>
          </div>



          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_gestion_parametros_vista.php">Gestión de Parámetros</a></li>
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

        <form action="../Controlador/movil_guardar_parametro_controlador.php" method="POST" >

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Nuevo Parámetro</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <tbody>
              <tr>
              </tr>
            </tbody>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="descripcion"> Nombre del Parámetro </label>
                    <input autofocus class="form-control" type="text" maxlength="60" id="parametro" name="parametro" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                  </div>
                  <div class="form-group">
                    <label for="ubicacion url">Descripción del Parámetro</label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" required style="text-transform: uppercase" onkeyup="Espacio(this, event)" onkeypress="return Letras(event)" onkeypress="return comprobar(this.value, event, this.id)" maxlength="30">
                  </div>

                </div>

                <div class="form-group">
                    <label for="txt_valorparametro">Valor del Parámetro</label>
                    <input class="form-control" type="text" id="valor" name="valor" required style="text-transform: uppercase"  maxlength="30">
                  </div>

                </div>

                <div class="form-group">
                    <label for="txt_fecha_modificacion">Fecha Modificación</label>
                    <?php 
                
                $fe=date("Y-m-d\TH:i");
                //echo "HOra serfver: ".$fe;
                 ?>
                <!--<input class="form-control" type="datetime-local" id="txt_fecha_modificacion" name="txt_fecha_modificacion" required onkeydown="return false" min="<?php $fecha_n?>" max="<?php $f_despues?>">-->
                <input class="form-control" value="<?php $fe=date("Y-m-d\TH:i");?>" type="datetime-local" id="txt_fecha_modificacion" name="txt_fecha_modificacion" min="<?php echo date("Y-m-d\TH:i",strtotime($fe."-10 hour"));?>"  max="<?php echo date("Y-m-d\TH:i",strtotime($fe."+ 5 month"));?>" required >
                
                  </div>

              </div>

              <br>

            </div>
          </div>
          <p class="text-center" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary" id="btn_guardar_parametro" name="btn_guardar_parametro"><i class="zmdi zmdi-floppy"></i>Guardar</button>
          </p>
        </form>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
      </div>
      <div class="RespuestaAjax"></div>
      </form>
  </div>
  </section>
  </div>
</body>
</html>