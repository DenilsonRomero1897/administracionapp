<?php

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
//require_once('../Modelos/movil_segmentos_modelo.php');

//DATOS PARA EL PDF
$sql2 = "
select
    n.parametro,
    n.descripcion,
    n.valor,
    n.fecha_modificacion,
    n.creado_por,
    s.Usuario
FROM
    tbl_movil_parametros n inner join tbl_usuarios s on n.modificado_por=s.Id_usuario or n.creado_por = s.Usuario";
$query = $mysqli->query($sql2);
$clientes = array();
$cont = 0;
while ($r = $query->fetch_object()) {
  $clientes[] = $r;
  $cont++;
}

$Id_objeto = 12;
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
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INGRESO', 'A GESTION DE PARAMETROS ');
}

// /* Esta condicion sirve para  verificar el valor que se esta enviando al momento de dar click en el icono modicar */
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM tbl_movil_parametros WHERE id = '$id'";
  $resultado = $mysqli->query($sql);
  //     /* Manda a llamar la fila */
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

    $id = $row['id'];
 // $_SESSION['txtparametro'] = $row['parametro'];
 // $_SESSION['txtDescripcion'] = $row['descripcion'];
   $_SESSION['txtvalor'] = $row['valor'];
 
  if (isset($_SESSION['txtvalor'])) {

?>
    <script>
      $(function() {
        $('#modal_modificar_parametros').modal('toggle')
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
                       text:"Lo sentimos el Parametro ya existe",
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
  if ($msj == 5) {
    echo '<script type="text/javascript">
                    swal({
                       title:"",
                       text:"el valor no puede quedar sin valor",
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
            <h1>Gestión de Parámetros</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_menu_gestion_vista.php">Gestión App</a></li>
            </ol>
          </div>

          <div class="RespuestaAjax"></div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!--Pantalla 2-->
    <div class="card card-default">
      <div class="card-header">
      <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" id="GenerarReporte" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>
      <a class="btn btn-primary btn-xs float-right" href="../vistas/movil_crear_parametros_vista.php">Nuevo</a>
        <!--buscador-->
        <div class="float-right mt-5 ml-5">
        <input class="form-control" placeholder="Buscar..." type="text" id="buscartext" name="buscar" onpaste="return false" onkeyup="leer(this.value)">
        </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>PARÁMETRO</th>
              <th>DESCRIPCIÓN</th>
              <th>VALOR</th>
              <th>FECHA_MOD</th>
              <th>CREADO_POR</th>
              <th>MOD_POR</th>
              <th>EDITAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_parametros = "select * from tbl_movil_parametros";
            $resultado_parametros = $mysqli->query($sql_parametros);
            while ($parametro = $resultado_parametros->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $parametro['id']; ?></td>
                <td><?php echo $parametro['parametro']; ?></td>
                <td><?php echo $parametro['descripcion']; ?></td>
                <td><?php echo $parametro['valor']; ?></td>
                <td><?php echo $parametro['fecha_modificacion']; ?></td>
                <td><?php echo $parametro['creado_por']; ?></td>
                <td><?php echo $parametro['modificado_por']; ?></td>

                <td style="text-align: center;">
                  <a href="../vistas/movil_gestion_parametros_vista.php?&id=<?php echo $parametro['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>
                
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <form action="../Controlador/movil_guardar_parametros_controlador.php?op=editar&id=<?php echo $id ?>" method="post" data-form="update" autocomplete="off">

    <div class="modal fade" id="modal_modificar_parametros">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modificar Parámetro</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Cuerpo del modal-->
          <div class="modal-body">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
               <!--   <div class="form-group">
                    <label>Parametro</label>
                    <input class="form-control" type="text" id="parametro" name="parametro" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtparametro']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Descripcion</label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtDescripcion']; ?>">
                  </div>  -->
                  <div class="form-group">
                    <label>Valor</label>
                    <input class="form-control" type="text" id="valor" name="valor" style="text-transform: uppercase" onpaste="return false" onkeyup="DobleEspacio(this, event)" required="" maxlength="60" value="<?php echo $_SESSION['txtvalor']; ?>">
                  </div>
                  </div>
              </div>
            </div>
          <!--Footer del modal-->
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btn_modificar_parametros" name="btn_modificar_parametros">Guardar Cambios</button>
          </div>
        </div>
       
      </div>
      
   </div>
           
  </form>
              
  <script type="text/javascript">
    $(function() {
      $('#tabla').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
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
      window.open("../Controlador/movil_reporte_parametros_controlador.php", "REPORTE");
    }

    var arrayJS = <?php echo json_encode($clientes) ?>;
        $("#GenerarReporte").click(function() {
          var pdf = new jsPDF('landscape');
          var logo = new Image();
          logo.src = '../dist/img/logo_ia.jpg';
          pdf.addImage(logo, 15, 10, 30, 30);
          pdf.setFont('Arial',);
          pdf.setFontSize(12);
          pdf.text(90, 15, "UNIVERSIDAD NACIONAL AUTÓNOMA DE HONDURAS");
          pdf.text(70, 23, "FACULTAD DE CIENCIAS ECONÓMICAS, ADMINISTRATIVAS Y CONTABLES");
          pdf.text(105, 30, "DEPARTAMENTO DE INFORMÁTICA ");
          pdf.setFont('Arial','B');
          pdf.setFontSize(14);
          pdf.text(110,38,"REPORTE DE PARÁMETROS");
          var columns = ["#", "Parámetros","Descripción","Valor","Fecha de Modificación","Modificado Por","Creado Por"];
          var data = [];
          for (var i = 0; i < arrayJS.length; i++) {
            data.push([i + 1, arrayJS[i]['parametro'],arrayJS[i]['descripcion'],arrayJS[i]['valor'],arrayJS[i]['fecha_modificacion'],arrayJS[i]['creado_por'],arrayJS[i]['Usuario']]);
          }

          pdf.autoTable(columns, data, {
            margin: {
              top: 45
            }
          });
       
          pdf.save('ReporteParametros.pdf');

        });

  </script>
</body>

</html>