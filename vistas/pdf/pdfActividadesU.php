<?php
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página 
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(115);
    //$this->Cell(115);
    // Título
    $this->Write(5,'Reporte de Actividades');
    // Salto de línea
    $this->Ln(20);
    $this->SetFont('Arial','B',7);
    $this->Cell(7,10, utf8_decode("N°"), 1, 0, 'C', 0);
    $this->Cell(10,10, "Tipo", 1, 0, 'C', 0);
    $this->Cell(10,10, "Caso", 1, 0, 'C', 0);
    $this->Cell(15,10, "Emisor", 1, 0, 'C', 0);
    $this->Cell(30,10, "Personal UPTVirtual", 1, 0, 'C', 0);
    $this->Cell(25,10, "Codigo", 1, 0, 'C', 0);
    $this->Cell(25,10, "Nombres", 1, 0, 'C', 0);
    $this->Cell(25,10, "Apellidos", 1, 0, 'C', 0);
    $this->Cell(40,10, "Descripcion", 1, 0, 'C', 0);
    $this->Cell(25,10, "Celular", 1, 0, 'C', 0);
    $this->Cell(25,10, "Correo", 1, 0, 'C', 0);
    $this->Cell(25,10, "Fecha", 1, 0, 'C', 0);
    $this->Cell(15,10, "Estado", 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require '../../config/APP.php';
require '../../config/SERVER.php';

//$consulta = "SELECT * FROM oevactpactividadqrs";
//$codigo="SELECT * FROM oevactpactividadqrs";
$consulta="SELECT * FROM oevactpactividadqrs AS act
INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE act.UPUcodigo && act.ACTestado=1";
  

$resultado = $mysqli->query($consulta );
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AliasNbPages();
$pdf->AddPage('landscape');
$pdf->SetFont('Times','',8);

$i = 1;
while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(7,10, $i,1,0,'C',0);
    //$pdf->Cell(10,10,utf8_decode($row['ACTnombres']), 1, 0, 'C', 0);
    $pdf->Cell(10,10,utf8_decode( $row['TIPnombre']), 1, 0, 'C', 0);
    //$pdf->MultiCell(10,5,utf8_decode( $row['CASnombre']), 1, 'D', 0);
    $pdf->Cell(10,10,utf8_decode( $row['CASnombre']), 1, 'D', 0);
    $pdf->Cell(15,10,utf8_decode( $row['TIUnombre']), 1, 0, 'C', 0);
    $pdf->Cell(30,10,utf8_decode( $row['UPUusuario']), 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['ACTcodigoUPT'], 1, 0, 'C', 0);
    $pdf->Cell(25,10,utf8_decode( $row['ACTnombres']), 1, 0, 'C', 0);
    $pdf->Cell(25,10,utf8_decode( $row['ACTapellidos']), 1, 0, 'C', 0);
    $pdf->Cell(40,10,utf8_decode( $row['ACTDescripcion']), 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['ACTcelular'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['ACTcorreoelectronico'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['ACTfecha'], 1, 0, 'C', 0);
    $pdf->Cell(15,10, $row['ACTestado'], 1, 1, 'C', 0);
    $i++;
}
$pdf->Output();
?>