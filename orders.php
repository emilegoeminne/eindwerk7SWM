<?php
    include("includes/db_conn.php");
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
            <h2> Bestellingen</h2>
            <?php
                $query = "SELECT * FROM order_product";
                if (!empty($_SESSION['email'])) {
                    if (!$result = mysqli_query($conn, $query)) {
                        echo "FOUT: Query kon niet uitgevoerd worden";
                        exit;
                    }

                    // stap 3: De resultaten naar het scherm schrijven
                    while ($rij = mysqli_fetch_array($result)) {
                        if (mysqli_num_rows($result) > 0) {
                            if ($_SESSION['email'] == $rij['email']) {
                                echo "<p>Products bought are : </p>";
                                        $sql = "SELECT * FROM producten WHERE product_id=".$rij['product'];
                                        if (!$result2 = mysqli_query($conn,$sql)) {
                                            echo "FOUT: Query kon niet uitgevoerd worden";
                                            exit;
                                        }
                                        while ($row = mysqli_fetch_array($result2))
                                        {
                                            ?>
                                            <div class="container-fluid">
                                                <p class="col"><?php echo $row['naam'];?></p>
                                                <?php
                                                    echo "
                                                    <img class='col-3 img-fluid' src=\"images /{$row['foto']}\" alt=\"Fles van de smaak {$row['naam']}\" >
                                                     ";
                                                ?>
                                            </div>

                                            <?php
                                        } //afsluiten while

                                echo "
                                        <p>with an amount of : </p>".$rij['amount']."
                                        <form method='get'>
                                            <input type=\"hidden\" name=\"id\" value=\"{$rij['id']}\" >
                                            <button type=\"button\" class=\"btn btn-underline\"><a href=\"factuur.php?id={$rij['id']}\">Factuur</a></button>
                                        </form>
                                     ";
                            }
                        } else {
                            echo "<h2>test</h2>";
                            echo "<p>Koop gerust iets</p>";
                        }
                    }
                } else {
                    echo "</h2>U bent niet ingelogd!</h2>";
                }
                }
                    ?>
                </div>
                <footer class="footer">
                    <span>Juicy3 By Emile Goeminne</span>
                </footer>
                <script src="js/dist/main.min.js"></script>
            </body>
        </html>



    

