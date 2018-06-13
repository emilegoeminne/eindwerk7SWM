<?php
    session_start();
    include ('includes/db_conn.php');
    if(!isset($_SESSION['name']) && !$_SESSION['rank'] == 2){
        header("Location:index.php");
        exit;
    }else if(isset($_SESSION['name']) && $_SESSION['rank'] == 2){
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
            <div class="container">
                <form method="post" action="send-mail__back.php">
                    <label for="subject">Onderwerp *</label>
                    <input type="text" name="subject" value="Sappige Naam" required autofocus>
                    <br><br>
                    <label for="message">Message *</label>
                    <textarea rows="4" cols="50" name="message" placeholder="Welcome to our newsletter!" required ></textarea>
                    <br><br>
                    <input type="submit">
                </form>
            </div>
        </body>
    </html>

<?php
    }else{
        echo "Gelieve in te loggen";
    }
?>