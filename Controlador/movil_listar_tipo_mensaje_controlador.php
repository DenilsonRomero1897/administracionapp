<?php require_once('../clases/Conexion.php');
require_once('../clases/conexion_mantenimientos.php');

$instancia_conexion = new conexion();  ?>

<table id="tabla" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>TIPO MENSAJE</th>
              <th>EDITAR</th>
              <th>BORRAR</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_tipomensaje = "select * from tbl_movil_tipo_mensajes";
            $resultado_tipomensaje = $mysqli->query($sql_tipomensaje);
            while ($tipomensaje = $resultado_tipomensaje->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $tipomensaje['id']; ?></td>
                <td><?php echo $tipomensaje['tipo_mensaje']; ?></td>
                
                

                <td style="text-align: center;">

                  <a href="../vistas/movil_mantenimiento_tipo_mensaje_vista.php?&id=<?php echo $tipomensaje['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $tipomensaje['id']; ?>)">
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

  </div>

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