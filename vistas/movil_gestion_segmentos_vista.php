<?php

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
//require_once('../Modelos/movil_segmentos_modelo.php');

$Id_objeto = 127;
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
  bitacora_movil::evento_bitacora($_SESSION['id_usuario'], $Id_objeto, 'INGRESO', 'A GESTION DE SEGMENTOS ');
}

// /* Esta condicion sirve para  verificar el valor que se esta enviando al momento de dar click en el icono modicar */
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM tbl_movil_segmentos WHERE id = '$id'";
  $resultado = $mysqli->query($sql);
  //     /* Manda a llamar la fila */
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $id = $row['id'];
  $_SESSION['txtNombre'] = $row['nombre'];
  $_SESSION['txtDescripcion'] = $row['descripcion'];
  $_SESSION['txtCreado_por'] = $row['creado_por'];

  if (isset($_SESSION['txtNombre'])) {

?>
    <script>
      $(function() {
        $('#modal_modificar_segmento').modal('toggle')
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
            <h1>Gestión de Segmentos</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
            </ol>
          </div>

          <div class="RespuestaAjax"></div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!--Pantalla 2-->



    <div class="card card-default">
      <div class="card-header">
      <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-pdf buttons-html5 btn-danger" tabindex="0" aria-controls="tabla2" type="button" onclick="ventana()" title="Exportar a PDF"><span><i class="fas fa-file-pdf"></i> </span> </button> </div>   
      <a class="btn btn-primary btn-xs float-right" href="../vistas/movil_crear_segmento_vista.php">Nuevo</a>
      </div>
     
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tabla" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>DESCRIPCIÓN</th>
              <th>CREADO POR</th>
              <th>FECHA DE CREACIÓN</th>
              <th>EDITAR</th>
              <th>ELIMINAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_segmentos = "select * from tbl_movil_segmentos";
            $resultado_segmentos = $mysqli->query($sql_segmentos);
            while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $segmento['id']; ?></td>
                <td><?php echo $segmento['nombre']; ?></td>
                <td><?php echo $segmento['descripcion']; ?></td>
                <td><?php echo $segmento['creado_por']; ?></td>
                <td><?php echo $segmento['fecha_creacion']; ?></td>

                <td style="text-align: center;">

                  <a href="../vistas/movil_gestion_segmentos_vista.php?&id=<?php echo $segmento['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                  <form action="../Controlador/movil_segmentos_controlador.php?op=eliminar&id=<?php echo $segmento['id']; ?>" method="POST" class="FormularioAjax" data-form="delete" autocomplete="off" >
                    <button type="submit" class="btn btn-danger btn-raised btn-xs">
                      <i class="far fa-trash-alt"></i>
                    </button>
                  </form>
                  <div class="RespuestaAjax"></div>
                </td>

              </tr>

            <?php } ?>

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

  </div>

  </div>





  </section>

  </div>

  <form action="../Controlador/movil_segmentos_controlador.php?op=editar&id=<?php echo $id ?>" method="post" data-form="update" autocomplete="off">

    <div class="modal fade" id="modal_modificar_segmento">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modificar Segmento</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <!--Cuerpo del modal-->
          <div class="modal-body">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">

                  <div class="form-group">
                    <label>Segmento</label>

                    <input class="form-control" type="text" id="nombre" name="nombre" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtNombre']; ?>">

                  </div>

                  <div class="form-group">
                    <label>Descripcion</label>

                    <input class="form-control" type="text" id="descripcion" name="descripcion" style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" required="" maxlength="30" value="<?php echo $_SESSION['txtDescripcion']; ?>">

                  </div>

                  <div class="form-group">
                <label>Tipo de Persona: </label>
                <select class="form-control" name="buscar_tipo_persona" id="buscar_tipo_persona" onchange="realizaProceso()">
                  <option value="">Seleccione una opción :</option>
                  <?php
                  $sql_tipo_persona = "SELECT id_tipo_persona,tipo_persona FROM tbl_tipos_persona";
                  $resultado_tipo_persona = $mysqli->query($sql_tipo_persona);
                  while ($tipo_persona = $resultado_tipo_persona->fetch_array(MYSQLI_ASSOC)) { ?>
                    <option value="<?php echo $tipo_persona['id_tipo_persona'] ?>"><?php echo $tipo_persona['tipo_persona'] ?></option>
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
                    <th>SELECCIONAR <input type="checkbox" class="ml-2" name="marcar_todos" id="marcar_todos" onclick="toggle(this)"></th>
                  </tr>
                </thead>
                <tbody id="resultado">
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
            <script>
    function realizaProceso() {
      var tipo_persona = document.getElementById('buscar_tipo_persona').value;
      var parametros = {
        "tipoPersona": tipo_persona
      }
      $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../Controlador/movil_buscar_personas_controlador.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function() {
          $("#resultado").html("Procesando, espere por favor...");
        },
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          $("#resultado").html(response);
        }
      });
    }

    function toggle(source) {
      checkboxes = document.getElementsByName('persona');
      for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
      }

    }
   
  </script>









































              
              </div>
            </div>
          </div>

          <!--Footer del modal-->
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btn_modificar_segmento" name="btn_modificar_segmento">Guardar Cambios</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- /.  finaldel modal -->



  </form>


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
      window.open("../Controlador/movil_reporte_gestion_segmentos.php", "REPORTE");
    }
  </script>
</body>

</html>