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
        $this->Cell(330, 10, utf8_decode("REPORTE BITÁCORA"), 0, 0, 'C');
        $this->ln(17);
        $this->SetFont('Arial', '', 12);
        $this->Cell(100, 10, utf8_decode(""), 0, 0, 'C');
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
        $this->Cell(10, 7, utf8_decode("N°"), 1, 0, 'C');
        $this->Cell(30, 7, utf8_decode("USUARIO"), 1, 0, 'C');
        $this->Cell(30, 7, utf8_decode("OBJETO"), 1, 0, 'C');
        $this->Cell(30, 7, utf8_decode("ACCIÓN"), 1, 0, 'C');
        $this->Cell(200, 7, utf8_decode("DESCRIPCIÓN"), 1, 0, 'C');
        $this->Cell(40, 7, "FECHA", 1, 0, 'C');

        $this->ln();
    }
    function viewTable()
    {  
        global $instancia_conexion;
        $sql = "
        select  
            n.id,
            s.Usuario,
            p.objeto,
            n.accion,
            n.descripcion,
            n.fecha
            
           
        FROM
            tbl_movil_bitacoras n inner join tbl_usuarios s on n.usuario_id=s.Id_usuario
            inner join tbl_objetos p on n.objeto_id=p.id_objeto ";
       
        $stmt = $instancia_conexion->ejecutarConsulta($sql);
         while ($reg = $stmt->fetch_array(MYSQLI_ASSOC)) {

            $this->SetFont('Times', '', 12);
            $this->Cell(10, 7, $reg['id'], 1, 0, 'C');
            $this->Cell(30, 7, utf8_decode($reg['Usuario']), 1, 0, 'C');
            $this->Cell(30, 7, utf8_decode($reg['objeto']), 1, 0, 'C');
            $this->Cell(30, 7, $reg['accion'], 1, 0, 'C');
            $this->Cell(200, 7, $reg['descripcion'], 1, 0, 'C');
            $this->Cell(40, 7, $reg['fecha'], 1, 0, 'C');

            $this->ln();
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
