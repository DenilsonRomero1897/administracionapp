<?php
require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_visualizar.php');



if (permiso_ver('126') == '1') {

  $_SESSION['movil_crear_tipo_recurso_vista'] = "...";
} else {
  $_SESSION['movil_crear_tipo_recurso_vista'] = "No 
  tiene permisos para visualizar";
}
if (permiso_ver('127') == '1') {

  $_SESSION['movil_mantenimiento_tipo_recurso_vista'] = "...";
} else {
  $_SESSION['movil_mantenimiento_tipo_recurso_vista'] = "No 
  tiene permisos para visualizar";
}


if (permiso_ver('128') == '1') {

  $_SESSION['movil_crear_tipo_notificacion_vista'] = "...";
} else {
  $_SESSION['movil_crear_tipo_notificacion_vista'] = "No 
  tiene permisos para visualizar";
}
if (permiso_ver('2') == '1') {

  $_SESSION['movil_mantenimiento_tipo_notificacion_vista'] = "...";
} else {
  $_SESSION['movil_mantenimiento_tipo_notificacion_vista'] = "No 
  tiene permisos para visualizar";
}
if (permiso_ver('3') == '1') {

  $_SESSION['movil_crear_tipo_mensaje_vista'] = "...";
} else {
  $_SESSION['movil_crear_tipo_mensaje_vista'] = "No 
  tiene permisos para visualizar";
}
if (permiso_ver('4') == '1') {

  $_SESSION['movil_mantenimiento_tipo_mensaje_vista'] = "...";
} else {
  $_SESSION['movil_mantenimiento_tipo_mensaje_vista'] = "No 
  tiene permisos para visualizar";
}

if (permiso_ver('7') == '1') {

  $_SESSION['movil_crear_tipo_transaccion_vista'] = "...";
} else {
  $_SESSION['movil_crear_tipo_transaccion_vista'] = "No 
  tiene permisos para visualizar";
}

if (permiso_ver('8') == '1') {

  $_SESSION['movil_mantenimiento_tipo_transaccion_vista'] = "...";
} else {
  $_SESSION['movil_mantenimiento_tipo_transaccion_vista'] = "No 
  tiene permisos para visualizar";
}
if (permiso_ver('9') == '1') {

  $_SESSION['movil_crear_ubicacion_recurso_vista'] = "...";
} else {
  $_SESSION['movil_crear_ubicacion_recurso_vista'] = "No 
  tiene permisos para visualizar";
}
if (permiso_ver('10') == '1') {

  $_SESSION['movil_mantenimiento_ubicacionrecurso_vista'] = "...";
} else {
  $_SESSION['movil_mantenimiento_ubicacionrecurso_vista'] = "No 
  tiene permisos para visualizar";
}

?> 
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">



</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">MANTENIMIENTOS  APP</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <div class="card card-default">
          <div class="card-header">
          
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
            <div class="col-md-12">
              
     
        

      <!-- /.info-box -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row" style="  display: flex;
    align-items: center;
    justify-content: center;">
            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-light">
                <div class="inner">
                  <h4>Crear Nuevo Recurso  </h4>
                  <p><?php echo $_SESSION['movil_crear_tipo_recurso_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-plus-square"></i>
                </div>

                <a href="../vistas/movil_crear_tipo_recurso_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>

            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <!-- /.info-box -->
            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h4>Mantenimiento Tipo Recurso</h4>
                  <p><?php echo $_SESSION['movil_mantenimiento_tipo_recurso_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-edit"></i>
                </div>

                <a href="../vistas/movil_mantenimiento_tipo_recurso_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>

            </div>
            <!-- /.row -->
          </div>
          <!--/. container-fluid -->
        </div>
      </section>
      <!-- /.content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row" style="  display: flex;
    align-items: center;
    justify-content: center;">

            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-light">
                <div class="inner">
                  <h4>Crear Tipo Notificación </h4>
                  <p><?php echo $_SESSION['movil_crear_tipo_notificacion_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-plus-square"></i>
                </div>

                <a href="../vistas/movil_crear_tipo_notificacion_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h4>Mantenimiento Tipo Notificación</h4>
                  <p><?php echo $_SESSION['movil_mantenimiento_tipo_notificacion_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-edit"></i>
                </div>

                <a href="../vistas/movil_mantenimiento_tipo_notificacion_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.row -->
          </div>
          <!--/. container-fluid -->
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row" style="  display: flex;
    align-items: center;
    justify-content: center;">

            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-light">
                <div class="inner">
                  <h4>Crear Tipo Mensaje</h4>
                  <p><?php echo $_SESSION['movil_crear_tipo_mensaje_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-plus-square"></i>
                </div>

                <a href="../vistas/movil_crear_tipo_mensaje_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h4>Mantenimiento Tipo Mensaje </h4>
                  <p><?php echo $_SESSION['movil_mantenimiento_tipo_mensaje_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-edit"></i>
                </div>

                <a href="../vistas/movil_mantenimiento_tipo_mensaje_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.row -->
          </div>
          <!--/. container-fluid -->
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row" style="  display: flex;
    align-items: center;
    justify-content: center;">

            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-light">
                <div class="inner">
                  <h4>Crear Tipo Transacción</h4>
                  <p><?php echo $_SESSION['movil_crear_tipo_transaccion_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-plus-square"></i>
                </div>

                <a href="../vistas/movil_crear_tipo_transaccion_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h4>Mantenimiento Tipo Transacción </h4>
                  <p><?php echo $_SESSION['movil_mantenimiento_tipo_transaccion_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-edit"></i>
                </div>

                <a href="../vistas/movil_mantenimiento_tipo_transaccion_vista.php" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>

            </div>

            <!-- /.row -->
          </div>
          <!--/. container-fluid -->
        </div>
      </section>
      
 <!-- /.content -->
 
              <!-- /.info-box -->
            </div>
           

                
              </div>


     

     


              



  </div>

  </div>

</body>

</html>