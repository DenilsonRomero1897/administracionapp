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
              <th>DESCRIPCIÓN</th>
              <th>FECHA Y HORA</th>
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
        $con=mysqli_connect('127.0.0.1','root','','bdadministracionapp') or die ('Error en la conexion');  
        $sql="SELECT * FROM tbl_movil_notificaciones ORDER BY id";  
        $resultado=mysqli_query($con,$sql) or die ('Error en el query database');  
        //Valida que la consulta esté bien hecha
        if( $resultado ){

              //Ahora valida que la consuta haya traido registros
          if( mysqli_num_rows( $resultado ) > 0){

             //Mientras mysqli_fetch_array traiga algo, lo agregamos a una variable temporal
             while($fila = mysqli_fetch_array( $resultado ) ){

              //Ahora $fila tiene la primera fila de la consulta, pongamos que tienes
              //un campo en tu DB llamado NOMBRE, así accederías
              $id = $fila['id'];
              $titulo = $fila['titulo'];
              $descripcion = $fila['descripcion'];
              $fecha = $fila['fecha'];
              $segmento_id = $fila['segmento_id'];
              $tipo_notificacion_id = $fila['tipo_notificacion_id'];
      ?>
                              <tr>

                                  <td > <?php echo $id ?>
                                  </td>
                                  <td > <?php echo $titulo?>
                                  </td>
                                  <td > <?php echo $descripcion?>
                                  </td>
                                  <td > <?php echo $fecha?>
                                  </td>
                                  <td > <?php echo $segmento_id?>
                                  </td>
                                  <td > <?php echo $tipo_notificacion_id?>
                                  </td>
                                  <td>
                                    <button type="button"  rel="tooltip" data-toggle="modal" data-target="#modalEditarSexo" title="Editar" class="btn btn-primary btn-link btn-sm" onclick="#">
                                      <i class="material-icons">edit</i>
                                    </button>
                                  </td>
                                  <td>
                                    <a title="Eliminar" href="#" data-href="#" data-toggle="modal" data-target="#modalEliminarSexo"><i class="material-icons" style="color: red;">Eliminar</i></a>
                                  </td>
                              <?php
    }

  }

  //liberar la memoria del resultado, 
  mysqli_free_result( $resultado );

  //cerrar conexion
  mysqli_close( $con );

}
    ?>
        
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