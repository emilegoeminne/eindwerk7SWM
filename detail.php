<?php
if (!isset($_GET["product_id"])){
	// als de url-parameter niet werd meegegeven ga terug naar index.php
	header('Location: index.php');
	exit;
}
session_start();
  
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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="products.php">Producten</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><img src="images/cart.png" class="cart" alt="Winkelmand voor knop Koop nu"><button type="button" class="btnUnderline"><a class="buy">Koop nu</a></button></li>
                                <?php
                                if(isset($_SESSION['name']) && $_SESSION['rank'] == 2){
                                    ?>
                                    <li>
                                        <a href="toevoegen.php">Toevoegen</a>
                                    </li>
                                    <li>
                                        <a href="admin.php">Admin</a>
                                    </li>
                                    <?php
                                }
                                if(!isset($_SESSION['name'])){
                                    ?>
                                    <li>
                                        <a href="login.php">log in</a>
                                    </li>
                                    <?php
                                }else if(isset($_SESSION['name']) && $_SESSION['rank'] > 0){
                                    ?>
                                    <li>
                                        <a href="uitlog.php">Uitloggen</a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                            <div class="socials">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="images/logos/fb.svg">
                                    </div>
                                    <div class="col-4">
                                        <img src="images/logos/ig.svg">
                                    </div>
                                    <div class="col-4">
                                        <img src="images/logos/yt.svg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="hamburger-icon" id="btnOpenNav">&#9776;</span>
                </div>
            </div>
        </header>
        <div class="container-fluid row">
            <?php

            //stap 1b: bestand db_conn.php insluiten
            include("includes/db_conn.php");


            // stap 2: De query opstellen en uitvoeren

            $query = "SELECT * FROM producten WHERE product_id=".$_GET["product_id"];

            if (!$result = mysqli_query($conn,$query)) {
                echo "FOUT: Query kon niet uitgevoerd worden"; 
                exit;
            }


            // stap 3: De resultaten naar het scherm schrijven
            while ($rij = mysqli_fetch_array($result)) {
                echo "
                <div class='row align-items-center'>
                    <div class=\"col\">
                        <img class='img-100' src=\"images/{$rij['foto']}\" alt=\"Fles van de smaak Banaan\" >
                    </div>

                    <div class='col detailContent products'>
                        <div class='header'>
                            <h3>{$rij['naam']}</h3>
                        </div>
                        <p>{$rij['description']}</p>
                            <div class='contentContainer'>
                                <div class='iconAndContent'>
                                    <div class='col smallIcon'>
                                        <img class='' src=\"images/icons/care.svg\" alt=\"Zorg\" >
                                    </div>
                                    <div class='col smallIconContent'>
                                        <p>Gezond!</p>
                                    </div>
                                </div>
                                <div class='iconAndContent'>
                                    <div class='col smallIcon'>
                                        <img class='' src=\"images/icons/flask.svg\" alt=\"Zorg\" >
                                    </div>
                                    <div class='col smallIconContent'>
                                        <p>Geen chemishe troep</p>
                                    </div>
                                </div>
                                <div class='iconAndContent'>
                                    <div class='col smallIcon'>
                                        <img class='' src=\"images/icons/gum.svg\" alt=\"Zorg\" >
                                    </div>
                                    <div class='col smallIconContent'>
                                        <p>Natuurlijke suikers</p>
                                    </div>
                                </div>
                                <div class='iconAndContent'>
                                    <div class='col smallIcon'>
                                        <img class='' src=\"images/icons/leaf.svg\" alt=\"Zorg\" >
                                    </div>
                                    <div class='col smallIconContent'>
                                        <p>Altijd vers</p>
                                    </div>
                                </div>
                            </div>
                            <p class='bigText'>€ {$rij['prijs']}</p>
                        <form method=\"post\" action=\"add_to_cart.php\">
                            <label for=\"amount\">Amount</label>
                            <input type=\"number\" name=\"amount\" value=\"amount\" required >*
                            <input type=\"hidden\" name=\"product_id\" value=\"{$rij['product_id']}\" >
                            <input type=\"hidden\" name=\"name\" value=\"{$rij['naam']}\" >
                            <input type=\"submit\" name=\"toevoegen\" value=\"Toevoegen\">
                        </form>
                    </div>
                </div>";

            }


            // stap 4: De verbinding met de database sluiten  

            if (!mysqli_close($conn)) {
                echo "FOUT: De verbinding kon niet worden gesloten"; 
                exit;
            } 
            ?>
        </div>
        <footer class="footer">
            <span>Juicy3 By Emile Goeminne</span>
        </footer>
        <script src="js/dist/main.min.js"></script>
    </body>
</html>


    

