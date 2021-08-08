<?php require_once('../clases/Conexion.php'); 
    if (isset($_POST)) {
        $segmento = $_POST['segmento'];
    }

?>

<table id="tabla-segmento-usuario" class="table table-bordered table-striped" style="width:100%">
    <thead>
        <tr>
            <th hidden>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>BORRAR </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT u.Id_usuario,p.nombres,p.apellidos FROM tbl_personas p 
        INNER join tbl_usuarios u on p.id_persona=u.id_persona 
        INNER join tbl_movil_segmento_usuario su on su.usuario_id = u.Id_usuario and su.segmento_id = $segmento";
        $resultado = $mysqli->query($sql);
        while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <tr>
                <td hidden><?php echo $fila['Id_usuario']; ?></td>
                <td><?php echo $fila['nombres']; ?></td>
                <td><?php echo $fila['apellidos']; ?></td>
                <td style="text-align: center;">
                       <button type="submit" class="btn btn-danger btn-raised btn-xs" onclick="eliminar(<?php echo $fila['Id_usuario']; ?>,document.getElementById('Segmento').value)">
                            <i class="far fa-trash-alt"></i>
                        </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
 $(function() {
      $('#tabla-segmento-usuario').DataTable({
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