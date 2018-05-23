<?php
include ('includes/db_conn.php');
if(isset($_GET['id'])){
	// SQL-injectie voorkomen
		// 1) zet integers om met (int) $_POST['naamveld']
		$_GET['id'] = (int) $_GET['id'];

	// stap 2: De query opstellen en uitvoeren

	$query = "UPDATE login SET isactive = 1 WHERE id = {$_GET['id']}";

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
	echo "Het lukte";
	exit; 
}



    

