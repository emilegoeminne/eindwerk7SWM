<?php
//stap 1b: bestand db_conn.php insluiten
include("../includes/db_conn.php");
session_start(); // Altijd nodig om te starten ook op andere paginas
$query = "SELECT * FROM order_product ";

            if (!$result = mysqli_query($conn,$query)) {
                echo "FOUT: Query kon niet uitgevoerd worden"; 
                exit;
            }
$company = $_POST['inputName'];
$address = $_POST['inputStreet'];
$number = $_POST["number"];
$item = implode(' ||| ', array_keys($_SESSION['winkelwagen']));
$price = $_SESSION['rtotal'];
$bank = $_POST["bank"];
$iban = $_POST["iban"];
$paypal = $_POST["paypal"];
$pay = 'Payment information';
$price = str_replace(",",".",$price);
$vat = str_replace(",",".",$vat);
$p = explode(" ",$price);
$v = explode(" ",$vat);
$re = $p[0] + $v[0];
function r($r)
{
  $r = str_replace("$","",$r);
  $r = str_replace(" ","",$r);
  $r = $r." $";
  return $r;
}
$price = r($price);
$vat = r($vat);
require('u/fpdf.php');

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetTextColor(32);
$pdf->Cell(0,5,$company,0,1,'R');
$pdf->Cell(0,5,$address,0,1,'R');
$pdf->Cell(0,5,$email,0,1,'R');
$pdf->Cell(0,5,'Tel: '.$telephone,0,1,'R');
$pdf->Cell(0,30,'',0,1,'R');
$pdf->SetFillColor(200,220,255);
$pdf->ChapterTitle('Invoice Number ',$number);
$pdf->ChapterTitle('Invoice Date ',date('d-m-Y'));
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(170,7,'Item',1,0,'L');
$pdf->Cell(20,7,'Price',1,1,'C');
$pdf->Cell(170,7,$item,1,0,'L',0);
$pdf->Cell(20,7,$price,1,1,'C',0);
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'VAT',1,0,'R',0);
$pdf->Cell(20,7,$vat,1,1,'C',0);
$pdf->Cell(170,7,'Total',1,0,'R',0);
$pdf->Cell(20,7,$re." $",1,0,'C',0);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,$pay,0,1,'L');
$pdf->Cell(0,5,$bank,0,1,'L');
$pdf->Cell(0,5,$iban,0,1,'L');
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,'PayPal:',0,1,'L');
$pdf->Cell(0,5,$paypal,0,1,'L');
$pdf->Cell(190,40,$com,0,0,'C');

unset($_SESSION['winkelwagen']);
//open het PDF-bestand
$pdf->Output();