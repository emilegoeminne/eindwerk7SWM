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
            <div class="row">
                <form  method="post" action="order-creation__back.php">
                    <div class="row">
                        <div class="col col-50">
                            <div class="col col-50">
                                <div class="form-group col">
                                    <label for="paypal" class="col-sm col-form-label">Paypal : </label>
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="paypal" id="paypal" placeholder="Harelbeke">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-50">
                                <div class="form-group col">
                                    <label for="creditCard" class="col-sm col-form-label">CreditCard : </label>
                                    <div class="col-sm">
                                        <input type="number" name="creditCard" class="form-control" id="creditCard" placeholder="8530">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-50">
                            <div class="form-group col">
                                <input type="hidden" name="id" value="" >
                                <label for="inputCardNumber" class="col-sm col-form-label">Card Number : </label>
                                <div class="col-sm">
                                    <input type="number" name="inputCardNumber" class="form-control" id="inputCardNumber" placeholder="1234 5678 9101 1121">
                                </div>
                                <label for="inputName" class="col-sm col-form-label">Cardholder name : </label>
                                <div class="col-sm">
                                    <input type="text" name="inputName" class="form-control" id="inputName" placeholder="John Doe">
                                </div>
                                <label for="inputDate" class="col-sm col-form-label">Expiry Date : </label>
                                <div class="col-sm">
                                    <input type="date" name="inputDate" class="form-control" id="inputDate" placeholder="11 / 21">
                                </div>
                                <label for="inputCode" class="col-sm col-form-label">CCV : </label>
                                <div class="col-sm">
                                    <input type="date" name="inputCode" class="form-control" id="inputCode" placeholder="11 / 21">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit">
                </form>
            </div>
        </div>
        <footer class="footerBottom">
            Juicy3 By Emile Goeminne
        </footer>
        <script src="js/dist/main.min.js"></script>
    </body>
</html>