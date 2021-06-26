<?php

ob_start();


session_start();

require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_bitacora_movil.php');
require_once('../clases/funcion_visualizar.php');
require_once('../clases/funcion_permisos.php');
require_once('../Modelos/segmentos_modelo.php');


$Id_objeto = 125;

bitacora_movil::evento_bitacora($_SESSION['id_usuario'],$Id_objeto, 'Ingreso', 'A Crear Segmentos');

$visualizacion = permiso_ver($Id_objeto);
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
            <h1>Nuevo Segmento</h1>
          </div>



          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_menu_segmentos_vista.php">Segmentos</a></li>
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

        <form action="../Controlador/guardar_segmento_controlador.php" method="POST" >

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Crear Nuevo Segmento</h3>

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
                    <label for="nombre"> Nombre del segmento</label>
                    <input autofocus class="form-control" type="text" maxlength="60" id="nombre" name="nombre" required style="text-transform: uppercase" onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                  </div>


                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" required style="text-transform: uppercase" onkeyup="Espacio(this, event)" onkeypress="return Letras(event)" onkeypress="return comprobar(this.value, event, this.id)" maxlength="30">
                  </div>

                </div>

              </div>

              <div class="form-group">
                <label>Usuarios</label>
                <div class="row container">
                  <div class="col-md-6">
                    <label>Tipo persona</label><br>
                    <input type="checkbox" class="TP" name="TP" value="docente">:Docente<br>
                    <input type="checkbox" class="TP" name="TP" value="estudiante">:Estudiante<br>
                    <input type="checkbox" class="TP" name="TP" value="coordinador">:Coordinador<br>
                    <input type="checkbox" class="TP" name="TP" value="todos">:Todos
                  </div>
                  <div class="col-md-6">
                    <label>Genero</label><br>
                    <input type="checkbox" class="genero" name="genero" value="hombres">:Hombres<br>
                    <input type="checkbox" class="genero" name="genero" value="mujeres">:Mujeres<br>
                    <input type="checkbox" class="genero" name="genero" value="todos">:Todos
                  </div>
                </div>
              </div>

              <br>

            </div>
          </div>
          <p class="text-center" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary" id="btn_guardar_segmentos" name="btn_guardar_segmentos"><i class="zmdi zmdi-floppy"></i>Guardar</button>
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


  <script>
    function validarNumeroCheckbox(valor) {
      var marcas = 0;
      var checks = document.getElementsByClassName(valor);
      for (let check of checks) {
        //añadimos un evento a cada check
        check.addEventListener("click", function() {
          //si se ha marcado
          if (this.checked) {
            //si se ha pasado el numero maximo de checks
            if (marcas == 1) {
              alert("Solo puedes marcar una opcion");
              //descmarcamos el check que marcó usuario
              this.checked = false;
              //si no se ha pasado el numero maximo de checks
            } else {
              marcas++;
            }
            //si se ha desmarcado
          } else {
            //si no queda solo uno marcado
            if (marcas != 0) {
              marcas--;
              alert("sino se selecciona una opcion se agregaran todos los usuarios");
            } else {
              //marcamos el que quería desmarcar
              this.checked = true;
            }
          }
        })
      }
    }
    validarNumeroCheckbox('TP');
    validarNumeroCheckbox('genero');
  </script>

</body>

</html>