<?php require_once('../clases/Conexion.php'); ?>

<table id="tabla-notificaciones" class="table table-bordered table-striped" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>TITULO</th>
              <th>CONTENIDO</th>
              <th>FECHA Y HORA</th>
              <th>SEGMENTO</th>
              <th>TIPO NOTIFICACIÓN</th>
              <th>URL IMAGEN</th>
              <th>EDITAR</th>
              <th>ELIMINAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "
            select
                n.id,
                n.titulo,
                n.descripcion,
                n.fecha,
                s.nombre,
                p.descripcion,
                n.image_url
            FROM
                tbl_movil_notificaciones n inner join tbl_movil_segmentos s on n.segmento_id=s.id 
                inner join  tbl_movil_tipo_notificaciones p on n.tipo_notificacion_id=p.id";
            $resultado_notificaciones = $mysqli->query($sql);
            while ($fila = $resultado_notificaciones->fetch_array(MYSQLI_ASSOC)) { ?>
              <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['titulo']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['image_url'] ?></td>

                <td style="text-align: center;">
                  <a href="../vistas/movil_gestion_notificaciones_vista.php?&id=<?php echo $fila['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                    <i class="far fa-edit"></i>
                  </a>
                </td>

                <td style="text-align: center;">
                    <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $fila['id']; ?>);">
                      <i class="far fa-trash-alt"></i>
                    </button>
                
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

<script>
    $(function() {
      $('#tabla-notificaciones').DataTable({
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