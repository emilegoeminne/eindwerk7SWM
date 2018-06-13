<?php
    session_start();
    include("includes/db_conn.php");
?>
<!DOCTYPE html>
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
<?php
if(isset($_GET['id'])||isset($_SESSION['id'])) {

    if ($_SESSION['news'] == 1 ) {
        ?>
        <div class="container">
            <h2><span>Je bent al ingeschreven voor de nieuwsbrief!</span></h2>
        </div>
            <footer class="footer">
                <span>Juicy3 By Emile Goeminne</span>
            </footer>
            <script src="js/dist/main.min.js"></script>
    </body>
</html>
        </div>
        <?php
        exit;
    }
    // SQL-injectie voorkomen
    // 1) zet integers om met (int) $_POST['naamveld']
    if(isset($_GET['id'])){
        $_GET['id'] = (int)$_GET['id'];
        $_SESSION['id'] = $_GET['id'];
    }


    ?>
    <div class="container">
        <h2><span>Meld je aan voor de nieuwsbrief!</span></h2>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <label for="email">Email</label>
            <input type="text" name="email" value="mail@ik.com" required autofocus>*
            <br><br>
            <input type="hidden" name="id" value="<?php $_SESSION['id'] ?>" >
            <br><br>
            <input type="submit">

        </form>
    </div>
    <?php
    // validatie
    if (isset($_POST['email'])) {
        if ( $_POST['email'] !== $_SESSION['email']){
            $mail = "UPDATE login SET email = {$_POST['email']} WHERE id = {$_SESSION['id']}";
            if ($result = mysqli_query($conn, $mail)) {

                echo " YES ";

            }
        }

        $_POST['email'] = htmlspecialchars($_POST['email']);


        $to = $_POST['email'];
        $subject = "Juicy Email";

        $message = "
        <html>
            <head>
                <title>Welkom in een heel nieuwe wereld</title>
               </head>
            <body>
                <p>Beste " . $_SESSION['name'] . " </p>
                <table>
                    <tr>
                        <th><h4> Danku voor u aan te melden voor de nieuwsbrief !</h4></th>
                    </tr>
                    <tr>
                         <p> Uw email: " . $_POST["email"] . " </p>
                    </tr>
                </table>
            </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


    }

    ?>


    <?php

    if (isset($_POST['email'])) {

        $_POST['email'] = mysqli_real_escape_string($conn, $_POST['email']);


        echo " ";

        $sql = "UPDATE login SET newsletter = 1 WHERE id = {$_SESSION['id']}";
        $_SESSION['news'] = 1;

        if ($result = mysqli_query($conn, $sql)) {

            echo " YES ";

        } else {

            echo "<p>Query kan niet gelezen worden" . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "";
    }
}else{
?>
        <div class="container">
            <h2><span>Meld je aan voor de nieuwsbrief!</span></h2>
            <div class="alert alert-light" role="alert">
                <h5><strong>Zorg dat je ingelogd bent!</strong></h5>
            </div>
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <label for="email">Email</label>
                <input type="text" name="email" value="mail@ik.com" required autofocus>*
                <br><br>
                <input type="hidden" name="id" value="<?php $_GET['id'] ?>" >
                <br><br>
                <input type="submit">

            </form>
        </div>
<?php
}
?>
        <footer class="footer">
            <span>Juicy3 By Emile Goeminne</span>
        </footer>
        <script src="js/dist/main.min.js"></script>
    </body>
</html>