<?php
    include("includes/db_conn.php");
    session_start(); // Altijd nodig om te starten ook op andere paginas
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $unaam = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password=md5($password);
        $query = "SELECT * FROM login WHERE naam = '$unaam' AND wachtwoord = '$password' ";
       // or die("Failed Login".mysqli_error($conn));
        $result = mysqli_query($conn, $query);
        $res=mysqli_num_rows ( $result );
        $row = mysqli_fetch_array($result);
        if($row["naam"] == $unaam && $row["wachtwoord"] == $password && $res == 1){
            $_SESSION['name'] = $unaam;
            $_SESSION['wachtwoord'] = $password;
            $_SESSION['rank'] = $row["rank"];
            echo "Dag " .$_SESSION['name'] ;
            if( $_SESSION['rank'] == 2 ){
                ?>
                <a href='admin.php'> Controle Paneel </a>
                <?php
            }
            ?>
                <a href='uitlog.php'> Uitloggen </a>
				<a href='index.php'> Naar Index </a>
            <?php
        }
        else{
            echo "Foutieve inlog, Probeer nog eens!";

}
    $result = mysqli_query($conn, $query);
    }
    else{
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
        <main>
        <div class="container">
            <H2>Admin login</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="name">Naam : </label>
                <input type="text" name="username" placeholder="Naam" autofocus required />
                <input type="password" name="password" placeholder="Wachtwoord" required />
                <input type="hidden" name="rank" placeholder="" />
                <input type="submit" name="Submit" value="Submit!" />
            </form>
            <a href="register.php">Registreer</a>     
            </main>
        </div>
        
        <footer>
            <p>&copy; <?php echo date("Y");?> VISO Mariakerke</p>
        </footer>

    </body>
</html>
<?php
    }
    $conn->close(); 
    ?>
        </div>
        <script src="../js/dist/main.min.js"></script>
    </body>
</html>