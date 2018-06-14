<?php
    include("includes/db_conn.php");
    session_start();

    //stap 1b: bestand db_conn.php insluiten

    if (!isset($_GET["id"])){
        // als de url-parameter niet werd meegegeven ga terug naar index.php
        echo "ERROR: Could not able to execute" . mysqli_error($conn);
    }


    // stap 2: De query opstellen en uitvoeren

    $query = "SELECT * FROM order_product WHERE id=".$_GET["id"];

    if (!$result = mysqli_query($conn,$query)) {
        echo "FOUT: Query kon niet uitgevoerd worden";
        exit;
    }
    // stap 3: De resultaten naar het scherm schrijven
    while ($rij = mysqli_fetch_array($result)) {
        //gebruik de generator FPDF
        require('fpdf/fpdf.php');
        //stel het paginaformaat in
        $pdf=new FPDF('P', 'mm', 'A4');
        //maak een nieuwe pagina aan
        $pdf->Addpage();
        //gebruik Arial 16pt Vet
        $pdf->SetFont('Arial','B',16);
        //plaats de tekst
        $pdf->SetXY(60,10);
        $pdf->Cell(40,10,'FACTUUR VOOR BESTELLING '.$rij['id']);
        //plaats het logo
        $pdf->Image("images/logo.png", 100, 30, 10, 20);
        //volgend tekstkader
        $pdf->SetXY(95,80);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,10,'Factuur '.$rij['id']);
        $pdf->SetFont('Arial','',10);
        //volgend tekstkader
        $pdf->SetXY(10,100);
        $pdf->Cell(40,10,'Op naam van '.$rij['name']);
        $pdf->SetXY(10,120);
        $pdf->Cell(50,10,'Af te leveren op '.$rij['street'].' '.$rij['postcode'].' '.$rij['city'].' '.$rij['country']);
        $pdf->SetXY(10,140);
        $pdf->Cell(50,10,'Product nummer '.$rij['product']);
        $pdf->SetXY(10,160);
        $pdf->Cell(50,10,'Hoeveelheid : '.$rij['amount']);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetXY(150,180);
        $pdf->Cell(50,10,'Te betalen : '.$rij['total'].' euro');

        //open het PDF-bestand
        $pdf->Output();
    }
    // stap 4: De verbinding met de database sluiten

    if (!mysqli_close($conn)) {
        echo "FOUT: De verbinding kon niet worden gesloten";
        exit;
    }
?>