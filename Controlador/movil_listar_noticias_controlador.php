<?php require_once('../clases/Conexion.php'); ?>

<table id="tabla" class="table table-bordered table-striped" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>TITULO</th>
              <th>CONTENIDO</th>
              <th>FECHA Y HORA DE PUBLICACIÓN</th>
              <th>FECHA Y HORA DE VENCIMIENTO</th>
              <th>SEGMENTO</th>
              <th>EDITAR</th>
              <th>BORRAR</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM tbl_movil_noticias";
            $resultado_noticias = $mysqli->query($sql);
            while ($fila = $resultado_noticias->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['titulo']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['fecha_vencimiento']; ?></td>
                <td><?php echo $fila['segmento_id']; ?></td>

                <td style="text-align: center;">
                  <a href="../vistas/movil_gestion_noticia_vista.php?&id=<?php echo $fila['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                    <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $fila['id']; ?>)">
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