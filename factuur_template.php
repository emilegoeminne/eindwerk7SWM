<?php 
//gebruik de generator FPDF
require('factuur/fpdf.php');
//stel het paginaformaat in
$pdf=new FPDF('P', 'mm', 'A4');
//maak een nieuwe pagina aan
$pdf->Addpage();
//gebruik Arial 16pt Vet
$pdf->SetFont('Arial','B',16);
//plaats de tekst
$pdf->Cell(40,10,'FAKTOER');
//plaats het logo
$pdf->Image("factuur/images/viso.png", 10, 20, 40, 40);
//volgend tekstkader
$pdf->SetXY(10,80);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,10,'Factuur');
$pdf->SetFont('Arial','',10);
//volgend tekstkader
$pdf->SetXY(10,100);
$pdf->Cell(40,10,'Banaan Juicy 3');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'Te betalen : 100 euro');

//open het PDF-bestand
$pdf->Output();
?>
