<?php
//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");
session_start(); // Altijd nodig om te starten ook op andere paginas
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/dist/main.css">
        <title> Juicy 3 Webshop - Feel refreshed and free it's Juicy3! </title>
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#000000">
        <meta name="msapplication-TileColor" content="#f5f5f5">
        <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
        <meta name="theme-color" content="#f5f5f5">
    </head>
    <body>
        <header>
            <video autoplay muted loop id="myVideo">
                <source src="video/final.mp4" type="video/mp4">
            </video>
            <div class="container-fluid main-header">
                <!-- The video -->
                <div class="row">

                    <div class="col topLeftFixed">
                        <img src="images/cart_filled.png" class="cart" alt="Winkelmand voor knop Koop nu"><button type="button" class="btn-underline"><a href="products.php" class="buy">Koop nu</a></button>
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
                                    <li>
                                        <a href="orders-admin.php">Order Admin</a>
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
                                    <li>
                                        <a href="orders.php">Orders</a>
                                    </li>
                                    <li>
                                        <a href="nieuwsbrief.php">Newsletter</a>
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
            </div>
        </header>
        <div class="container page-main">
            <h2>Onze smaken</h2>
                <?php
                    // stap 2: De query opstellen en uitvoeren

                    $query = "SELECT * FROM producten";

                    if (!$result = mysqli_query($conn,$query)) {
                        echo "FOUT: Query kon niet uitgevoerd worden"; 
                        exit;
                    }


                    // stap 3: De resultaten naar het scherm schrijven

                    if (mysqli_num_rows($result) > 0) {
                            while ($rij = mysqli_fetch_array($result)) {
                                if($rij['product_id'] == 19 || $rij['product_id'] == 21){
                                    echo "
                                    <form action=\"add_to_cart.php\" method=\"post\">
                                        <div class='row align-items-center'>
                                            <div class=\"col align-items-left\">
                                                <img class='img-100' src=\"images/{$rij['foto']}\" alt=\"Fles van de smaak Banaan\" >
                                            </div>
                
                                            <div class='col products'>
                                                <h3>{$rij['naam']}</h3>
                                                <p>{$rij['description']}</p>
                                                <button type=\"submit\" name=\"toevoegen\" class=\"btn btn-underline\"><a>Bestel</a></button>
                                                <input type=\"hidden\" name=\"amount\" value=\"1\" required >
                                                <input type=\"hidden\" name=\"product_id\" value=\"{$rij['product_id']}\" >
                                                <button type=\"button\" class=\"btn btn-underline\"><a href=\"detail.php?product_id={$rij['product_id']}\">Meer Info</a></button>
                                            </div>
                                        </div>
                                     </form>";
                                }else{
                                    echo "
                                    <form action=\"add_to_cart.php\" method=\"post\">
                                        <div class='row usp align-items-center'>
                
                                            <div class='col products'>
                                                <h3>{$rij['naam']}</h3>
                                                <p>{$rij['description']}</p>
                                                <button type=\"submit\" name=\"toevoegen\" class=\"btn btn-underline\"><a>Bestel</a></button>
                                                <input type=\"hidden\" name=\"amount\" value=\"1\" required >
                                                <input type=\"hidden\" name=\"product_id\" value=\"{$rij['product_id']}\" >
                                                <button type=\"button\" class=\"btn btn-underline\"><a href=\"detail.php?product_id={$rij['product_id']}\">Meer Info</a></button>
                                            </div>
    
                                            <div class=\"col\">
                                                <img class='img-100 align-items-right ' src=\"images/{$rij['foto']}\" alt=\"Fles van de smaak Banaan\" >
                                            </div>
    
                                        </div>
                                    </form>";
                                }  
                                
                            }

                    }else {
                        echo "<p>Er werden geen gegevens gevonden in de DB</p>";	
                    } // einde if (mysqli_num_rows($result) > 0)



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