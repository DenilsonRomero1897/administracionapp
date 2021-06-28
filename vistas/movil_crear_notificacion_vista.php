<?php

ob_start();
session_start();
require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');

$Id_objeto = 128;

bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'Ingreso', 'A Crear Notificacion');



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
            <h1>Nueva Notificacion</h1>
          </div>


          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_menu_notificaciones_vista.php">Notificaciones</a></li>
            </ol>
          </div>

          <div class="RespuestaAjax"></div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!--PANTALLA -->

        <form action="../Controlador/movil_notificacion_controlador.php?op=insert" method="POST">

          <div class="card card-default">
            <div class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">

              <div class="form-group">
                <label for="titulo"> Titulo:</label>
                <input autofocus class="form-control" type="text" maxlength="60" id="titulo" name="titulo" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
              </div>

              <div class="form-group">
                <label for="Contenido">Contenido:</label>
                <input class="form-control" type="text" maxlength="60" id="Contenido" name="Contenido" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
              </div>

              <div class="form-group">
                <label>Segmentos: </label>
                <select class="form-control" name="Segmentos" id="Segmentos">
                  <option value="">Seleccione una opción :</option>
                  <?php 
                  $sql_segmentos = "SELECT id,nombre FROM tbl_movil_segmentos";
                  $resultado_segmentos = $mysqli->query($sql_segmentos);
                  while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $segmento['id'] ?>"><?php echo $segmento['nombre'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <!-- FECHA DE PUBLICACION txt_fecha_Publicacion -->
                <label for="txt_fecha_Publicacion">Fecha y Hora de Publicacion:</label>
                <input class="form-control" type="datetime-local" id="txt_fecha_Publicacion" name="txt_fecha_Publicacion" required onkeydown="return false">

              </div>

              <p class="text-center" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary" id="btn_guardar" name="btn_guardar"><i class="zmdi zmdi-floppy"></i>Guardar</button>
              </p>
            </div>
          </div>
        </form>
      </div>
  
  </section>
</div>

</body>