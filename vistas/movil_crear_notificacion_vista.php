<?php 

ob_start();
session_start();


<body>


?>


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

    <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Crear Nueva Notificacion</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="titulo"> Titulo:</label>
                    <input autofocus class="form-control" type="text" maxlength="60" id="titulo" name="titulo" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                  </div>

                  <div class="form-group">
                    <label for="Contenido">Contenido:</label>
                    <input class="form-control" type="text" id="Contenido" name="Contenido" required style="text-transform: uppercase" onkeyup="Espacio(this, event)" onkeypress="return Letras(event)" onkeypress="return comprobar(this.value, event, this.id)" maxlength="30">
                    <option value="0">Ingrese el Contenido:</option>
                  </div>

                </div>

                <div class="col-md-12">
                  <div class="form-group">
                  <label>Segmentos: </label>
                  <select class="form-control" name="Segmentos" id="Segmentos" onchange="Constancia();"> 
                  <option value="0">Seleccione una opción :</option>
                   <option value="Docente">Docente</option>
                    <option value="Estudiante">Estudiante</option>
                    <option value="Coordinador">Coordinador</option>
                    <option value="Todos">Todos</option>
                </select>
                </div>
                 </div>


                 <div class="col-md-12">
                    <div class="form-group">
                      <!-- FECHA DE PUBLICACION txt_fecha_Publicacion -->
                      <label>Fecha y Hora de Publicacion:</label>
                      <input class="form-control" type="date" id="txt_fecha_Publicacion" name="txt_fecha_Publicacion" required onkeydown="return false" required>

                    </div>
                  </div>


                     <p class="text-center" style="margin-top: 20px;">
                     <button type="submit" class="btn btn-primary" id="btn_guardar" name="btn_guardar"><i class="zmdi zmdi-floppy"></i>Guardar</button>
                     </p>

                     <p class="text-left" style="margin-top: 20px;">
                     <button type="submit" class="btn btn-primary" id="btn_vista_previa" name="btn_vista_previa"><i class="zmdi zmdi-floppy"></i>Vista Previa</button>
                     </p>



              </div>

}

