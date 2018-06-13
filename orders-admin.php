<?php
session_start();
if(!isset($_SESSION['name']) && !$_SESSION['rank'] == 2){
    header("Location:index.php");
    exit;
}else if(isset($_SESSION['name']) && $_SESSION['rank'] == 2){
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
            <h2> Bestellingen</h2>
            <?php

            //stap 1b: bestand db_conn.php insluiten
            include("includes/db_conn.php");


            // stap 2: De query opstellen en uitvoeren

            $query = "SELECT * FROM order_product ORDER BY order_date";

            if (!$result = mysqli_query($conn,$query)) {
                echo "FOUT: Query kon niet uitgevoerd worden"; 
                exit;
            }


            // stap 3: De resultaten naar het scherm schrijven
            while ($rij = mysqli_fetch_array($result)) {
                echo "
                <h2>Nieuwe Bestelling </h2>
                <div class='row align-items-center'>
                    <div class='col orders'>
                        <h4>Datum aankoop : {$rij['order_date']} </h4>
                        <h4>User</h4>
                        <h6>{$rij['name']}</h6>
                        <h4>Product </h4>
                        <p>{$rij['product']}</p>
                        <h4>Hoeveelheid </h4>
                        <h6>{$rij['amount']}</h6>
                        <h4>Totaal betaald</h4>
                        <p>{$rij['total']}</p>
                        <h4>Adres</h4>
                        <p>{$rij['street']}</p>
                        <p>{$rij['postcode']}</p>
                        <p>{$rij['city']}</p>
                        <p>{$rij['country']}</p>
                    </div>
                </div>";

            }


            // stap 4: De verbinding met de database sluiten  

            if (!mysqli_close($conn)) {
                echo "FOUT: De verbinding kon niet worden gesloten"; 
                exit;
            } 
        }else{
            echo "niet gemachtigd";
        }
        ?>
        </div>
        <footer class="footer">
            <span>Juicy3 By Emile Goeminne</span>
        </footer>
        <script src="js/dist/main.min.js"></script>
    </body>
</html>



    

