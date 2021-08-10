<?php
require_once('../clases/Conexion.php'); 
if (isset($_POST['funcion'])) {
    if ($_POST['funcion']=='eliminar') {
        eliminar();
    }
}
function eliminar(){
    $id = $_POST['id'];
    global $mysqli;
  $sql = "DELETE FROM `tbl_movil_noticia_recurso` WHERE recurso_id = $id";
  $resultado = $mysqli->query($sql);
  if ($resultado) {
      return 'hola_mundo';
  }else{
      return '';
  }
}

$id = isset($_POST['id']) ? $_POST['id']:'';

$sql_archivos = "SELECT id,url FROM `tbl_movil_tipo_recursos` r INNER JOIN tbl_movil_noticia_recurso nr
  INNER JOIN tbl_movil_noticias n on r.id=nr.recurso_id and n.id=nr.noticia_id and n.id = $id";
  $rspta = $mysqli->query($sql_archivos);
?>

<table id="tabla" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>URL</th>
            <th>ELIMINAR</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $rspta->fetch_array(MYSQLI_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['url']; ?></td>
                <td><a onclick="eliminar_archivos(<?php $row['id'] ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>

            </tr>
        <?php } ?>

    </tbody>
</table>

