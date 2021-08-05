<?php require_once('../clases/Conexion.php');
require_once('../clases/conexion_mantenimientos.php');

$instancia_conexion = new conexion();  ?>

<table id="tabla" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>DESCRIPCIÓN</th>
              <th>EXTERNAL_ID</th>
              <th>EDITAR</th>
              <th>BORRAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_tipotransaccion = "select * from  tbl_movil_tipo_transacciones";
            $resultado_tipotransaccion = $mysqli->query($sql_tipotransaccion);
            while ($transaccion = $resultado_tipotransaccion->fetch_array(MYSQLI_ASSOC)){ ?>
              <tr>
                <td><?php echo $transaccion['id']; ?></td>
                <td><?php echo $transaccion['descripcion']; ?></td>
                <td><?php echo $transaccion['external_id']; ?></td>
                

                <td style="text-align: center;">

                  <a href="../vistas/movil_mantenimiento_tipo_transaccion_vista.php?&id=<?php echo $transaccion['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $transaccion['id']; ?>)">
                      <i class="far fa-trash-alt"></i>
                    </button>
                    <div class="RespuestaAjax"></div>
                  </form>
                </td>

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
  </div>
  </section>



































<script>

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

</script>