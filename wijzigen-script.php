<?php
session_start(); // Altijd nodig om te starten ook op andere paginas
if(!isset($_SESSION['name']) && !$_SESSION['rank'] == 2){
    header("Location:index.php");
    exit;
}else if(isset($_SESSION['name']) && $_SESSION['rank'] == 2){
	if (empty($_POST["product_id"])){
		// als de url-parameter niet werd meegegeven ga terug naar admin.php
		header("Location:admin.php");
		exit;
	}

	if (empty($_POST["naam"]) && empty($_POST["description"]) ){
		// als de url-parameter niet werd meegegeven ga terug naar admin.php
		echo "Niet alle verplichte velden werden ingevuld.";
		exit;
	}

	//stap 1b: bestand db_conn.php insluiten
	include("includes/db_conn.php");

	// SQL-injectie voorkomen
		// 1) zet integers om met (int) $_POST['naamveld']
		$_POST['product_id'] = (int) $_POST['site_id'];
		$_POST['waardering'] = (int) $_POST['waardering'];
		$_POST['prijs'] = (int) $_POST['prijs'];
		
		// 2) met mysqli_real_escape_string($conn, $_POST['naamveld']
		$_POST['naam'] = mysqli_real_escape_string($conn, $_POST['naam']);
		$_POST['description'] = mysqli_real_escape_string($conn, $_POST['description']);
		$_POST['tags'] = mysqli_real_escape_string($conn, $_POST['tags']);
		$_POST['foto'] = mysqli_real_escape_string($conn, $_POST['foto']);


	// stap 2: De query opstellen en uitvoeren

	$query = "UPDATE producten SET naam = '{$_POST['naam']}', description = '{$_POST['description']}', tags = '{$_POST['tags']}', prijs = '{$_POST['prijs']}', waardering = {$_POST['waardering']}, foto = '{$_POST['foto']}' WHERE product_id = {$_POST['product_id']}";

	if (!$result = mysqli_query($conn,$query)) {
		echo "FOUT: Query kon niet uitgevoerd worden"; 
		exit;
	}

	// stap 3: niet nodig - we lezen niets uit de database

	// stap 4: De verbinding met de database sluiten  

	if (!mysqli_close($conn)) {
		echo "FOUT: De verbinding kon niet worden gesloten"; 
		exit;
	}


	// stap 5: Terugkeren naar admin.php  
	header("Location:admin.php");
	exit;

}
 




    

