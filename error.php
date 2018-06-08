<?php
    include("includes/db_conn.php");
    session_start();
    if(isset($_POST['remove'])) {
        // handle remove
        $key = $_POST['remove'];
        unset($_SESSION['winkelwagen'][$key]);
    }
    $som = 0;
    $real_total = 0;
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
        <?php 
        if(!empty($_SESSION['winkelwagen'])){ 
        ?>                
        <h4>Pagina niet gevonden, Error 404. </h4>
        <p> Mag je hier wel zijn? :l</p>
        <button type="button" class="btn btn-underline"><a href="products.php">Keer terug</a></button>
            <?php
        } // afsluiten if(!empty($_SESSION['winkelwagen'] 
        else{
            ?>
            <div class="container-fluid progress">
                <ol class='cart-progress'>
                    <li class='cart-progress__step active'>
                        <span class='cart-progress__step-label'></span>
                    </li>
                    <li class='cart-progress__step'>
                        <span class='cart-progress__step-label'></span>
                    </li>
                    <li class='cart-progress__step'>
                        <span class='cart-progress__step-label'></span>
                    </li>
                </ol>
                <div class="row">
                    <div class="col text-left">
                        <p >Cart</p>
                    </div>
                    <div class="col">
                        <p>Info</p>
                    </div>
                    <div class="col text-right">
                        <p>Payment</p>
                    </div>
                </div>
            </div>
            <h4>U heeft nog geen product geselecteerd! </h4>
            <button type="button" class="btn btn-underline"><a href="products.php">Keer terug</a></button>
            <?php
        }
        ?>
        <footer class="footer">
            <span>Juicy3 By Emile Goeminne</span>
        </footer>
        <script src="js/dist/main.min.js"></script>
    </body>
</html>