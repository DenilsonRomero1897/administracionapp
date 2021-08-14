<?php require_once('../clases/Conexion.php');
require_once('../clases/conexion_mantenimientos.php');

$instancia_conexion = new conexion();  ?>

<table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>ID</th>
              <th>TITULO</th>
              <th>EDITAR</th>
              <th>BORRAR</th>
              
                </tr>
              </thead>
              <tbody>
                <?php
                $sql_tiponotificacion = "select * from  tbl_movil_tipo_notificaciones";
                if (isset($_POST)) {
                  if (!empty($_POST['buscar'])) {
                    $dato = $_POST['buscar'];
                    $sql_tiponotificacion .= " WHERE descripcion LIKE '%$dato%'";
                  }
                }
                $resultado_tiponotificacion = $mysqli->query($sql_tiponotificacion);
                while ($notificacion = $resultado_tiponotificacion->fetch_array(MYSQLI_ASSOC)) { ?>
                  <tr>
                    <td><?php echo $notificacion['id']; ?></td>
                    <td><?php echo $notificacion['descripcion']; ?></td>
                    <td style="text-align: center;">
                      <a href="../vistas/movil_mantenimiento_tipo_notificacion_vista.php?&id=<?php echo $notificacion['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                        <i class="far fa-edit"></i>
                      </a>
                    </td>
                    <td style="text-align: center;">
                    <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $notificacion['id']; ?>)">
                          <i class="far fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- /.card-body -->
    </div>
  </div>

  <script>

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

</script>