<?php

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/conexion_mantenimientos.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
/*require_once('../Modelos/movil_segmentos_modelo.php');*/
$instancia_conexion = new conexion();

$Id_objeto = 14;
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
  $_SESSION['txtresponse'] = $row['response'];
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
         
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" onclick="ventana()" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
        
        <div class="col-md-3"></div>
      <form class="form-inline" method="POST" action="">
      <label> Fecha Desde: </label>
      <input type="date" class="form-control" placeholder="Start"  name="date1"/>
      <label> Hasta:  </label>
      <input type="date" class="form-control" placeholder="End"  name="date2"/>
      <button class="btn btn-primary" name="search" ><span class="glyphicon .glyphicon-search"></span></button> <a href="../vistas/movil_gestion_transacciones_vista.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
    </form>
    

        <div class="card-body">
            <table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>ID</th>
              <th>FECHA ENVIO</th>
              <th>REQUEST ENVIO</th>
              <th>RESPONSE</th>
              <th>ESTADO</th>
            
                </tr>
              </thead>
              <tbody>
              <?php
             
  
  if(ISSET($_POST['search'])){
    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));
    $query=mysqli_query($mysqli, "SELECT * FROM `tbl_movil_transacciones` WHERE `id` BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
    $row=mysqli_num_rows($query);
    if($row>0){
      while($fetch=mysqli_fetch_array($query)){
?>
  <tr>
    <td><?php echo $fetch['id']?></td>
    <td><?php echo $fetch['fecha_envio']?></td>
    <td><?php echo $fetch['request_envio']?></td>
    <td><?php echo $fetch['response']?></td>
    <td><?php echo $fetch['estado']?></td>
  </tr>
<?php
      }
    }else{
      echo'
      <tr>
        <td colspan = "4"><center>Registros no Existen</center></td>
      </tr>';
    }
  }else{
    $query=mysqli_query($mysqli,"SELECT * FROM `tbl_movil_transacciones`") or die(mysqli_error());
    while($fetch=mysqli_fetch_array($query)){
?>
  <tr>
    <td><?php echo $fetch['id']?></td>
    <td><?php echo $fetch['fecha_envio']?></td>
    <td><?php echo $fetch['request_envio']?></td>
    <td><?php echo $fetch['response']?></td>
    <td><?php echo $fetch['estado']?></td>
  </tr>
<?php
    }
  }
?>
   </tbody>
            </table>
          </div><!-- /.card-body -->
    </div>
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