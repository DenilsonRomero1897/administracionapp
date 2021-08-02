<?php require_once('../clases/Conexion.php');
require_once('../clases/conexion_mantenimientos.php');

$instancia_conexion = new conexion(); ?>


<table id="tablaSegmento" class="table table-bordered table-striped" style="width:100%">
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
        $sql_segmentos = "SELECT s.id, s.nombre, s.descripcion, s.fecha_creacion,
                                   u.Usuario
                                   FROM tbl_movil_segmentos s 
                                   INNER JOIN  tbl_usuarios u ON s.creado_por = u.Id_usuario";
        $resultado_segmentos = $instancia_conexion->ejecutarConsulta($sql_segmentos);
        while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { ?>
            <tr>
                <td><?php echo $segmento['id']; ?></td>
                <td><?php echo $segmento['nombre']; ?></td>
                <td><?php echo $segmento['descripcion']; ?></td>
                <td><?php echo $segmento['Usuario']; ?></td>
                <td><?php echo $segmento['fecha_creacion']; ?></td>

                <td style="text-align: center;">

                    <a href="../vistas/movil_gestion_segmentos_vista.php?&id=<?php echo $segmento['id']; ?>" class="btn btn-primary btn-raised btn-xs">
                        <i class="far fa-edit"></i>
                    </a>
                </td>

                <td style="text-align: center;">
                    <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $segmento['id']; ?>)">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    <div class="RespuestaAjax"></div>
                </td>

            </tr>

        <?php } ?>

    </tbody>
</table>
<script>
    $(function() {
      $('#tablaSegmento').DataTable({
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