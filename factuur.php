<?php
require('factuur/fpdf.php');

//Connect to your database
include("includes/db_conn.php");

//Select the Products you want to show in your PDF file
$result=mysqli_query($conn,"select product_dsc,name,product,id from order_product ORDER BY product");
$sql=mysqli_query($conn,"select product_id,naam,prijs from producten ORDER BY product_id");
$number_of_products = mysqli_num_rows($result);

//Initialize the 4 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$column_amount = "";
$total = 0;

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($sql))
{
	$name = substr($row["naam"],0,20);
	$column_name = $column_name.$name."\n";
	$real_price = $row["prijs"];
	
	
}
while($row = mysqli_fetch_array($result))
{
	$code = $row["id"];
	$amount_to_show = $row["product_dsc"];
	$column_code = $column_code.$code."\n";
	
	$amount = $row["product_dsc"];

	$column_price = $real_price;

	$column_amount = $amount_to_show;
	
	//Sum all the Prices (TOTAL)
	$total = $total+$real_price;
}
mysqli_close($conn);

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(20,6,'CODE',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'NAME',1,0,'L',1);
$pdf->SetX(135);
$pdf->Cell(30,6,'PRICE',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$column_price,1,'R');
$pdf->SetX(135);
$pdf->MultiCell(30,6,'$ '.$total,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(45);
	$pdf->MultiCell(120,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>
