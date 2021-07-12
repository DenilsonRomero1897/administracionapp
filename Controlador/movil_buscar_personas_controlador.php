<?php
 require_once '../clases/Conexion.php';

$valor = $_POST['tipoPersona'];
if ($valor > 0) {
    $sql_segmentos = "SELECT id_persona,nombres,apellidos FROM tbl_personas WHERE id_tipo_persona=$valor";
    $resultado_segmentos = $mysqli->query($sql_segmentos);

while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { 
    $id = $segmento['id_persona'];
    $nombre = $segmento['nombres'];
    $apellidos = $segmento['apellidos'];
    echo"
  <tr>
    <td hidden> $id</td>
    <td> $nombre </td>
    <td> $apellidos </td>
    <td style='text-align: center;'>
      <input type='checkbox' class='personas-check' name='persona' value='$id'><br>
      </a>
    </td>";
   } 
}


?>