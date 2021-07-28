<?php
 require_once '../clases/Conexion.php';

$valor = $_POST['tipoPersona'];
if ($valor > 0) {
    $sql_segmentos = "SELECT u.Id_usuario,p.nombres,p.apellidos FROM tbl_personas p
    inner JOIN tbl_usuarios u on u.id_persona=p.id_persona and p.id_tipo_persona = $valor";
    $resultado_segmentos = $mysqli->query($sql_segmentos);

while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { 
    $id = $segmento['Id_usuario'];
    $nombre = $segmento['nombres'];
    $apellidos = $segmento['apellidos'];
    echo"
  <tr>
    <td hidden> $id</td>
    <td> $nombre </td>
    <td> $apellidos </td>
    <td style='text-align: center;'>
      <input type='checkbox' class='personas-check' name='persona[]' value='$id' onchange='validar(this)'><br>
      </a>
    </td>";
   } 
}


?>