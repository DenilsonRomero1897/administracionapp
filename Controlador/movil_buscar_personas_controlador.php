<?php
 require_once '../clases/Conexion.php';

$valor = (int)$_POST['tipoPersona'];
$Segmento_id = (int)$_POST['segmento'];
if ($valor > 0) {
    $sql_segmentos = "SELECT u.Id_usuario,p.nombres,p.apellidos FROM tbl_personas p
    inner JOIN tbl_usuarios u on u.id_persona=p.id_persona and p.id_tipo_persona = $valor";
    $resultado_segmentos = $mysqli->query($sql_segmentos);

while ($segmento = $resultado_segmentos->fetch_array(MYSQLI_ASSOC)) { 
    $id = $segmento['Id_usuario'];
    $nombre = $segmento['nombres'];
    $apellidos = $segmento['apellidos'];

     $sql_exist = "select count(usuario_id) as exist from tbl_movil_segmento_usuario where segmento_id = $Segmento_id and usuario_id = $id";

     $resultado = $mysqli->query($sql_exist);
     $row = $resultado->fetch_assoc();
     if($row['exist']!=1){
      echo"
      <tr>
        <td hidden> $id</td>
        <td> $nombre </td>
        <td> $apellidos </td>
        <td style='text-align: center;'>
          <input type='checkbox' class='personas-check' name='persona[]' value='$id' onclick='this.disabled = true' onchange='validar(this)'><br>
          </a>
        </td>
        </tr>
        ";
     }
      
  
    
   } 
}


?>