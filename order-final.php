<?php
include("includes/db_conn.php");
session_start();
if(isset($_SESSION['lastId'])) {

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
    <body class="order">
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
                <p>Cart</p>
            </div>
            <div class="col">
                <p>Info</p>
            </div>
            <div class="col text-right">
                <p>Payment</p>
            </div>
        </div>
    </div>
    <form method="post" action="index.php">
        <?php
        if (!empty($_SESSION['lastId'])) {
            ?>
            <h4>Uw hebt zojuist dit gekocht: </h4>
            <?php
            foreach ($_SESSION['lastId'] as $key => $val) {
                $sql = "SELECT * FROM order_product WHERE id=$val";
                if (!$result = mysqli_query($conn, $sql)) {
                    echo "FOUT: Query kon niet uitgevoerd worden";
                    exit;
                }
                while ($rij = mysqli_fetch_array($result)) {
                    ?>
                    <div class="quantity">
                        <p class="col-6"><?php echo $rij['name']; ?></p>
                        <p class="col-6">
                            <?php
                            if($rij['product'] === 19){
                                echo 'Banaan';
                            }elseif($rij['product'] === 20){
                                echo 'Druif';
                            }else{
                                echo 'Appel';
                            }
                            ?></p>
                        <p class="col-6"><?php echo $rij['amount']; ?></p>
                    </div>
                    <div class="blueBackground">
                        <p class="float-left">Totaal</p>
                        <p>€ <?php echo $rij['total']; ?></p>
                    </div>

                    <?php
                } //afsluiten while

            } // afsluiten foreach

            ?>
            <?php
        } // afsluiten if(!empty($_SESSION['winkelwagen']
        else {
            ?>
            <h4>Gelieve eerst een product aan te kopen! </h4>
            <?php
        }
        ?>
    </form>
    <footer class="footer">
        <span>Juicy3 By Emile Goeminne</span>
    </footer>
    <script src="js/dist/main.min.js"></script>
    </body>
    </html>
    <?php
    unset($_SESSION['winkelwagen']);
    unset($_SESSION['lastId']);
}else{
    header("Location:index.php");
}

?>