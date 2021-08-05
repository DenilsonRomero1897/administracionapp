<?php require_once('../clases/Conexion.php');
require_once('../clases/conexion_mantenimientos.php');

$instancia_conexion = new conexion();  ?>
<table id="tabla" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>DESCRIPCIÓN</th>
              <th>URL</th>
              <th>EDITAR</th>
              <th>BORRAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql_tiporecurso = "select * from tbl_movil_tipo_recursos";
            $resultado_tiporecurso = $mysqli->query($sql_tiporecurso);
            while ($tiporecurso = $resultado_tiporecurso->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $tiporecurso['id']; ?></td>
                <td><?php echo $tiporecurso['descripcion']; ?></td>
                <td><?php echo $tiporecurso['url']; ?></td>
                

                <td style="text-align: center;">

                  <a href="../vistas/movil_mantenimiento_tipo_recurso_vista.php?&id=<?php echo $tiporecurso['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $tiporecurso['id']; ?>)">
                      <i class="far fa-trash-alt"></i>
                    </button>
                    
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      
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