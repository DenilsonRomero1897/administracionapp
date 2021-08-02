<?php
session_start();
require_once('../clases/conexion_mantenimientos.php');
require_once('../Reporte/pdf/fpdf.php');
$instancia_conexion = new conexion();


//$stmt = $instancia_conexion->query("SELECT tp.nombres FROM tbl_personas tp INNER JOIN tbl_usuarios us ON us.id_persona=tp.id_persona WHERE us.Id_usuario= 8");



class myPDF extends FPDF
{
    function header()
    {
        //h:i:s
        date_default_timezone_set("America/Tegucigalpa");
        $fecha = date('d-m-Y h:i:s');
        //$fecha = date("Y-m-d ");

        $this->Image('../dist/img/logo_ia.jpg', 30, 10, 35);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(330, 10, utf8_decode("UNIVERSIDAD NACIONAL AUTÓNOMA DE HONDURAS"), 0, 0, 'C');
        $this->ln(7);
        $this->Cell(325, 10, utf8_decode("FACULTAD DE CIENCIAS ECONÓMICAS, ADMINISTRATIVAS Y CONTABLES"), 0, 0, 'C');
        $this->ln(7);
        $this->Cell(330, 10, utf8_decode("DEPARTAMENTO DE INFORMÁTICA "), 0, 0, 'C');
        $this->ln(10);
        $this->SetFont('times', 'B', 20);
        $this->Cell(330, 10, utf8_decode("REPORTE GESTIÓN DE PARÁMETROS"), 0, 0, 'C');
        $this->ln(17);
        $this->SetFont('Arial', '', 12);
        $this->Cell(85, 10, utf8_decode(""), 0, 0, 'C');
        $this->Cell(420, 10, "FECHA: " . $fecha, 0, 0, 'C');
        $this->ln();
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 10);
        $this->cell(0, 10, 'Pagina' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function headerTable()
    {
        $this->SetFont('Times', 'B', 12);
        $this->SetLineWidth(0.3);
        $this->Cell(15, 7, utf8_decode("N°"), 1, 0, 'C');
        $this->Cell(55, 7, utf8_decode("PARÁMETROS "), 1, 0, 'C');
        $this->Cell(70, 7, utf8_decode("DESCRIPCIÓN"), 1, 0, 'C');
        $this->Cell(35, 7, utf8_decode("VALOR"), 1, 0, 'C');
        $this->Cell(60, 7, utf8_decode("FECHA_MODIFICACIÓN"), 1, 0, 'C');
        $this->Cell(55, 7, utf8_decode("MODIFICADO_POR"), 1, 0, 'C');
        $this->Cell(35, 7, utf8_decode("CREADO_POR"), 1, 0, 'C');
        $this->ln();
    }
    function viewTable()
     {
         global $instancia_conexion;
         $sql = "
         select
             n.parametro,
             n.descripcion,
             n.valor,
             n.fecha_modificacion,
             n.creado_por,
             s.Usuario
         FROM
             tbl_movil_parametros n inner join tbl_usuarios s on n.modificado_por=s.Id_usuario or n.creado_por = s.Usuario";
         $stmt = $instancia_conexion->ejecutarConsulta($sql);
          $serial=1;
        while ($reg = $stmt->fetch_array(MYSQLI_ASSOC)) {
            $this->SetFont('Times', '', 12);
            $this->Cell(15, 7, $serial, 1, 0, 'C');
            $this->Cell(55, 7, $reg['parametro'], 1, 0, 'C');
            $this->Cell(70, 7, $reg['descripcion'], 1, 0, 'C');
            $this->Cell(35, 7, utf8_decode($reg['valor']), 1, 0, 'C');
            $this->Cell(60, 7, utf8_decode($reg['fecha_modificacion']), 1, 0, 'C');
            $this->Cell(55, 7, utf8_decode($reg['creado_por']), 1, 0, 'C');
            $this->Cell(35, 7, $reg['Usuario'], 1, 0, 'C');
            $this->ln();
            $serial+=1;
        }
    }
}
 

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('C', 'Legal', 0);
$pdf->headerTable();
$pdf->viewTable();

//$pdf->viewTable2($instancia_conexion);
$pdf->SetFont('Arial', '', 15);


$pdf->Output();
