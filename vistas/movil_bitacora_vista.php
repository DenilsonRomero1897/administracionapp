<?php
session_start();
require_once('../clases/Conexion.php');
require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');

//DATOS PARA EL PDF
$sql2 = "
select  
    n.id,
    s.Usuario,
    p.objeto,
    n.accion,
    n.descripcion,
    n.fecha
FROM
    tbl_movil_bitacoras n inner join tbl_usuarios s on n.usuario_id=s.Id_usuario
    inner join tbl_objetos p on n.objeto_id=p.id_objeto ";
$query = $mysqli->query($sql2);


$Id_objeto = 128;

$visualizacion = permiso_ver($Id_objeto);

if ($visualizacion == 0) {
  header('location:  ../vistas/pagina_principal_vista.php');
} else {

  bitacora_movil::evento_bitacora($_SESSION["id_usuario"],$Id_objeto, "Ingreso", "A Bitacora del sistema movil");


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

<body onload="readProducts()">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1>Bitácora del Sistema Movil</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>

            </ol>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

  
    <!--Pantalla 2-->

    <div class="card card-default">
      <div class="card-header">
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" id= "GenerarReporte" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
      </div>
      <!-- /.card-header -->
      <div class="row">
        <div class="col-1 ml-2"><label> Inicio: </label></div>
      <div class="col-2">
      <input type="date" class="form-control" placeholder="Start" id="date1" name="date1" required/>
      </div>
      <div class="col-1"><label> Hasta:  </label></div>
      <div class="col-2">
      <input type="date" class="form-control" placeholder="End" id="date2" name="date2" required/>
      </div>
      <div class="col-2">
      <button class="btn btn-primary" name="search" onclick="readProducts();"><span class="glyphicon .glyphicon-search"></span>buscar</button>
      </div>
      <div class="col-2">
      <a href="../vistas/movil_bitacora_vista.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span>actualizar</a>
      </div>
      </div>
     
      <div class="card-body" id="bitacora">
       
      </div>


      <!-- /.card-body -->
    </div>


    <!-- /.card-body -->
    <div class="card-footer">

    </div>
  </div>


  <script type="text/javascript">
     function readProducts() {
      var fecha1 = document.getElementById('date1').value;
      var fecha2 = document.getElementById('date2').value;
      var parametro = {'inicio':fecha1,'final':fecha2}
      $.ajax({
        data: parametro, //datos que se envian a traves de ajax
        url: '../Controlador/movil_listar_bitacora_controlador.php', //archivo que recibe la peticion
        type: 'POST', //método de envio
        beforeSend: function() {
          $('#bitacora').html("Procesando, espere por favor...");
        },
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $('#bitacora').html(response);
        }
      });
    }
 

 </script>
</body>

</html>
