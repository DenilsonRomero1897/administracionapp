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
                n.remitente,
                n.fecha,
                s.nombre,
                p.descripcion as tipo_notificacion,
                n.image_url
            FROM
                tbl_movil_notificaciones n inner join tbl_movil_segmentos s on n.segmento_id=s.id 
                inner join  tbl_movil_tipo_notificaciones p on n.tipo_notificacion_id=p.id";
            $resultado_notificaciones = $mysqli->query($sql);
            $notificaciones = array();
            while ($fila = $resultado_notificaciones->fetch_array(MYSQLI_ASSOC)) { 
              $notificaciones[] = $fila;
              ?>
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

    var arrayJS = <?php echo json_encode($notificaciones) ?>;
    <?php date_default_timezone_set("America/Tegucigalpa");
        $fecha = date('d-m-Y h:i:s'); ?>
        $("#GenerarReporte").click(function() {
          var pdf = new jsPDF('landscape');
          var logo = new Image();
          logo.src = '../dist/img/logo_ia.jpg';
          pdf.addImage(logo, 15, 10, 30, 30);
          pdf.setFont('Arial',);
          pdf.setFontSize(12);
          pdf.text(90, 15, "UNIVERSIDAD NACIONAL AUTÓNOMA DE HONDURAS");
          pdf.text(70, 23, "FACULTAD DE CIENCIAS ECONÓMICAS, ADMINISTRATIVAS Y CONTABLES");
          pdf.text(105, 30, "DEPARTAMENTO DE INFORMÁTICA ");
          pdf.setFont('Arial','B');
          pdf.setFontSize(14);
          pdf.text(105, 38, "REPORTE DE NOTIFICACIONES");
          pdf.setFontSize(11);
          pdf.text(250,43,'<?php echo $fecha?>');
          var columns = ["#", "Titulo", "Descripción", "Fecha y Hora", "Remitente", "Segmento" ,"Tipo Notificación", "Imagen"];
          var data = [];
          for (var i = 0; i < arrayJS.length; i++) {
            data.push([i + 1, arrayJS[i]['titulo'], arrayJS[i]['descripcion'], arrayJS[i]['fecha'], arrayJS[i]['remitente'], arrayJS[i]['nombre'], arrayJS[i]['tipo_notificacion'],arrayJS[i]['image_url']]);
          }

          pdf.autoTable(columns, data, {
            margin: {
              top: 45
            }
          });
          const addFooters = pdf => {
            const pageCount = pdf.internal.getNumberOfPages()

            pdf.setFont('helvetica', 'italic')
            pdf.setFontSize(9)
            for (var i = 1; i <= pageCount; i++) {
                pdf.setPage(i)
                pdf.text('Pag. ' + String(i) + ' de ' + String(pageCount), pdf.internal.pageSize.width / 2, 200, {
                    align: 'center'
                })
            }
        }
        addFooters(pdf);
      
        pdf.save('Reporte_Notificaciones_'+ '<?php echo $fecha?>' +'.pdf');

        });
</script>