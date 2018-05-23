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
            <div class="container-fluid row">
                <div class="container-fluid logo">
                    <img src="images/logo.png" alt="Juicy 3 Logo">
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
            <h2>Producten</h2>
            <div class="row">
                <div class="col">
                    <img class="img-100" src="images/fles_geel.png" alt="Fles van de smaak Banaan">
                </div>
                <div class="col">
                    <img class="img-100" src="images/fles_blauw.png" alt="Fles van de smaak Banaan">
                </div>
                <div class="col">
                    <img class="img-100" src="images/fles_green.png" alt="Fles van de smaak Banaan">
                </div>
            </div>
            <div class="row">
                <div class="col btnInfo">
                    <h3>Banaan</h3>
                    <button type="button" class="btn btn-underline"><a href="" class="">Bestel</a></button>
                    <button type="button" class="btn btn-underline"><a href="product/banaan.php" class="">Meer Info</a></button>
                </div>
                <div class="col btnInfo">
                    <h3>Druif</h3>
                    <button type="button" class="btn btn-underline"><a href="" class="">Bestel</a></button>
                    <button type="button" class="btn btn-underline"><a href="product/druif.php" class="">Meer Info</a></button>
                </div>
                <div class="col btnInfo">
                    <h3>Appel</h3>
                    <button type="button" class="btn btn-underline"><a href="#" class="">Bestel</a></button>
                    <button type="button" class="btn btn-underline"><a href="product/appel.php" class="">Meer Info</a></button>
                </div>
            </div>
        </div>
        <footer class="footerBottom">
            Juicy3 By Emile Goeminne
        </footer>
        <script src="js/dist/main.min.js"></script>
    </body>
</html>