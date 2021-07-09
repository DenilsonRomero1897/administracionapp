<?php
session_start();
require_once('../clases/Conexion.php');
require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');






$Id_objeto = 128;

$visualizacion = permiso_ver($Id_objeto);



if ($visualizacion == 0) {
  header('location:  ../vistas/pagina_principal_vista.php');
} else {

  bitacora_movil::evento_bitacora($_SESSION["id_usuario"],$Id_objeto, "Ingreso", "A Bitacora del sistema movil");


  /* Manda a llamar todos las datos de la tabla para llenar el gridview  */
  $sql_tabla_bitacora_movil = "select u.Usuario, o.objeto, b.accion, b.descripcion, Date_format(b.fecha,'%Y-%m-%d %H:%i:%S') as Fecha from tbl_usuarios u, tbl_movil_bitacoras b, tbl_objetos o where u.Id_usuario=b.usuario_id and b.objeto_id=o.Id_objeto";
  $resultadotabla_bitacora = $mysqli->query($sql_tabla_bitacora_movil);

  if (isset($_REQUEST['msj'])) {
    $msj = $_REQUEST['msj'];

    if ($msj == 1) {
      echo '<script> alert("Fecha invalidas favor verificar.")</script>';
    }

    if ($msj == 2) {
      echo '<script> alert("Datos por rellenar, por favor verificar.")</script>';
    }
    if ($msj == 3) {
      echo '<script> alert("Por favor verificar fechas.")</script>';
    }
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

            <h1>Bitacora del Sistema Movil</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>

            </ol>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- <section class="content">
      <div class="container-fluid">
        <!-- pantalla 1

        <form action="../Controlador/#" method="post" data-form="save" autocomplete="off">

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Datos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>


            <!-- /.card-header 
            <div class="card-body">
              <div class="row">


                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Fecha Inicio</label>
                    <input class="form-control" type="date" id="txt_fecha_inicio" name="txt_fecha_inicio">
                  </div>


                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Fecha Final</label>
                    <input class="form-control" type="date" id="txt_fecha_final" name="txt_fecha_final">
                  </div>

                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Usuario</label>
                    <input class="form-control" type="text" id="txt_usuario_bitacora" name="txt_usuario_bitacora" value="" style="text-transform: uppercase" onkeyup="Espacio(this, event)" onkeypress="return Letras(event)">
                  </div>

                </div>
                <div class="col-sm-6">

                  <div class="form-group">
                    <label>Accion</label>
                    <select class="form-control" name="accion_bitacora" id="accion_bitacora">
                      <option value="0">Seleccione una opcion:</option>
                      <option value="Ingreso">Ingreso</option>
                      <option value="Inserto">Inserto</option>
                      <option value="Modifico">Modifico</option>
                      <option value="Elimino">Elimino</option>

                    </select>
                  </div>
                </div>

                <p class="text-center" style="margin-top: 20px;">
                  <button type="submit" class="btn btn-primary" id="btn_filtrar_bitacora"><i class="zmdi zmdi-floppy"></i> Filtrar</button>
                </p>












              </div>
            </div>



            <!-- /.card-body 
            <div class="card-footer">

            </div>
          </div>




        </form>

      </div>
    </section> -->
    <!--Pantalla 2-->

    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Registros de Bitacora Movil</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla_bitacora" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>USUARIO</th>
              <th>OBJETO</th>
              <th>ACCION</th>
              <th>DESCRIPCION</th>
              <th>FECHA y HORA</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $resultadotabla_bitacora->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $row['Usuario']; ?></td>
                <td><?php echo $row['objeto']; ?></td>
                <td><?php echo strtoupper($row['accion']); ?></td>
                <td><?php echo strtoupper($row['descripcion']); ?></td>
                <td><?php echo $row['Fecha']; ?></td>
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


  <script type="text/javascript">

  $(function () {
    
     $('#tabla_bitacora').DataTable({
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
