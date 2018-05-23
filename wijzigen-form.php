<?php
session_start(); // Altijd nodig om te starten ook op andere paginas
if(!isset($_SESSION['name']) && !$_SESSION['rank'] == 2){
    header("Location:index.php");
    exit;
}else if(isset($_SESSION['name']) && $_SESSION['rank'] == 2){
if (!isset($_GET["product_id"])){
	// als de url-parameter niet werd meegegeven ga terug naar admin.php
	header('Location: admin.php');
	exit;
}


//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");


// stap 2: De query opstellen en uitvoeren

$query = "SELECT * FROM producten WHERE product_id=".$_GET["product_id"];

if (!$result = mysqli_query($conn,$query)) {
    echo "FOUT: Query kon niet uitgevoerd worden"; 
	exit;
}


// stap 3: De resultaten naar het scherm schrijven
// while-lus is niet nodig omdat we maar 1 record selecteren
$rij = mysqli_fetch_array($result);


// stap 4: De verbinding met de database sluiten  

if (!mysqli_close($conn)) {
    echo "FOUT: De verbinding kon niet worden gesloten"; 
    exit;
}

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/dist/main.css">
        <title> Juicy 3 Webshop - Feel refreshed and free it's Juicy3! </title>
        <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
        <link rel="manifest" href="../images/favicon/site.webmanifest">
        <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#000000">
        <meta name="msapplication-TileColor" content="#f5f5f5">
        <meta name="msapplication-TileImage" content="../images/favicon/mstile-144x144.png">
        <meta name="theme-color" content="#f5f5f5">
    </head>
    <body>
        <header>
            <div class="container-fluid row">
                <div class="container-fluid logo">
                    <img src="../images/logo.png" alt="Juicy 3 Logo">
                </div>
                <div class="col">
                    <div id="mySidenav" class="sidenav">
                        <a href="#" class="closebtn" id="btnCloseNav">&times;</a>
                        <div class="mobile-menu-items">
                            <ul>
                                <li><a href="../index.php">Home</a></li>
                                <li><a href="../products.php">Producten</a></li>
                                <li><a href="../contact.php">Contact</a></li>
                                <li><img src="../images/cart.png" class="cart" alt="Winkelmand voor knop Koop nu"><button type="button" class="btnUnderline"><a class="buy">Koop nu</a></button></li>
                            </ul>
                            <div class="socials">
                                <img src="#">
                                <img src="#">
                                <img src="#">
                            </div>
                        </div>
                    </div>
                    <span class="hamburger-icon" id="btnOpenNav">&#9776;</span>
                </div>
            </div>
        </header>
        <div class="container">
			<h2>Wijzigen</h2>
			<form action="wijzigen-script.php" method="post">
				<label for="naam">naam</label>
				<input name="naam" id="naam" type="text" autofocus required value="<?php echo $rij['naam'];?>">
				
				<label for="description">description</label>
				<input name="description" id="description" type="text" required value="<?php echo $rij['description'];?>">
				
				<label for="tags">tags</label>
				<input name="tags" id="tags" type="text" required value="<?php echo $rij['tags'];?>">

				<label for="prijs">prijs</label>
				<input name="prijs" id="prijs" type="text" value="<?php echo $rij['prijs'];?>">

				<label for="waardering">waardering</label>
				<input name="waardering" id="waardering" type="number" value="<?php echo $rij['waardering'];?>">

				<label for="foto">foto</label>
				<input name="foto" id="foto" type="text" value="<?php echo $rij['foto'];?>">
				
				<!-- VERGEET NIET OM DE ID MEE TE GEVEN! -->
				<input name="product_id" id="product_id" type="hidden" value="<?php echo $rij['product_id'];?>">

				<input type="submit" name="btn_wijzigen" id="btn_wijzigen" value="wijzigen">
			</form>
		</div>
		<footer class="footerBottom">
            Juicy3 By Emile Goeminne
        </footer>
        <script src="../js/dist/main.min.js"></script>
    </body>
</html>
<?php
}
?>