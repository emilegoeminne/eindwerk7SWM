<?php
    include ('includes/db_conn.php');
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
        </header>

        <div class="container">
            <h2>Contacteer Ons!</h2>
            <div class="alert alert-light" role="alert">
                <strong>Vul dit in en verstuur ons je feedback!</strong>
            </div>
            <form action="contact__back.php" method="post">
                <div class="row">
                    <div class="col col-50">
                        <div class="form-group col">
                            <label for="inputName" class="col-sm col-form-label">Naam : </label>
                            <div class="col-sm">
                                <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Naam">
                            </div>
                            <label for="inputEmail" class="col-sm col-form-label">Email : </label>
                            <div class="col-sm">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
                            </div>
                            <label class="col-sm col-form-label">Probleem met bestelling? </label>
                            <div class="col-sm">
                                <button type="button" name class="btn btn-underline"><a href="" class="">Ja</a></button>
                                <button type="button" class="btn btn-underline"><a href="" class="">Nee</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col col-50">
                        <div class="form-group col">
                            <label for="inputMessage" class="col-sm col-form-label">Bericht : </label>
                            <div class="col-sm">
                                <textarea class="form-control" name="inputMessage" rows="8" cols="50">Bericht</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col formSubmit">
                        <button type="submit" class="btn btn-underline">Verzend</button>
                    </div>
                </div>
            </form>
        </div>
        <footer class="footer">
            <span>Juicy3 By Emile Goeminne</span>
        </footer>
        <script src="js/dist/main.min.js"></script>
    </body>
</html>