<?php
//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");
session_start(); // Altijd nodig om te starten ook op andere paginas
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
                                <li><a href="../index.php">Home</a></li>
                                <li><a href="../products.php">Producten</a></li>
                                <li><a href="../contact.php">Contact</a></li>
                                <li><img src="../images/cart.png" class="cart" alt="Winkelmand voor knop Koop nu"><button type="button" class="btnUnderline"><a class="buy">Koop nu</a></button></li>
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
    <?php

    // stap 2: De query opstellen en uitvoeren

    $query = "SELECT * FROM producten";

    if (!$result = mysqli_query($conn,$query)) {
        echo "FOUT: Query kon niet uitgevoerd worden"; 
        exit;
    }


    // stap 3: De resultaten naar het scherm schrijven

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='main-title'><h2>Admin</h2></div>";
            while ($rij = mysqli_fetch_array($result)) {
                echo "
                <div class='row align-items-center'>
                    <div class=\"col\">
                        <img class='img-100' src=\"images/{$rij['foto']}\" alt=\"Fles van de smaak Banaan\" >
                    </div>
    
                    <div class='col products'>
                        <h3>{$rij['naam']}</h3>
                        <p>{$rij['description']}</p>
                        <a href=\"detail.php?product_id={$rij['product_id']}\">meer info</a> 
                        <a href=\"verwijderen.php?product_id=".$rij['product_id']."\" onclick=\"return confirm('Ben je zeker?')\">verwijderen</a> 
                        <a href=\"wijzigen-form.php?product_id={$rij['product_id']}\">wijzigen</a>  
                    </div>
                </div>";
            }

    }else {
        echo "<p>Er werden geen gegevens gevonden in de DB</p>";	
    } // einde if (mysqli_num_rows($result) > 0)



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
        <footer class="footerBottom">
            Juicy3 By Emile Goeminne
        </footer>
        <script src="../js/dist/main.min.js"></script>
    </body>
</html>


    

