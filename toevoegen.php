<?php
    session_start();
    if(!isset($_SESSION['name']) && !$_SESSION['rank'] == 2){
        header("Location:index.php");
        exit;
    }else if(isset($_SESSION['name']) && $_SESSION['rank'] == 2){
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class='main-content'>
            <header>
                <nav>
                    <ul>
                        <li>
                            <a href="index.php">Index</a>
                        </li>
                        <li>
                            <a href="admin.php">Admin</a>
                        </li>
                        <li>
                            <a href="toevoegen.php">Toevoegen</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                        <li>
                            <a href="uitlog.php">Uitloggen</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <form method="post" action="add.php">
                <label for="naam">Naam</label>
                <input type="text" name="naam" value="Sappige Naam" required autofocus>*
                <br><br>
                <label for="Description">Description</label>
                <input type="text" name="Description" value="Description" required >*
                <br><br>
                <label for="prijs">prijs</label>
                <input type="number" name="prijs" value="75" required>*
                <br><br>
                <label for="tags">tags</label>
                <input type="text" value="Milieu Vriendelijk!" name="tags" >*
                <br><br>
                <label for="waardering">waardering</label>
                <input type="text" value="4" name="waardering" >*
                <br><br>
                <input type="hidden" name="product_id" value="" >
                <br><br>
                <input type="hidden" name="aankoopdatum" value="" >
                <br><br>
                <input type="submit">
            
            </form>
    </body>
</html>

<?php
    }else{
        echo "Gelieve in te loggen";
    }
?>
        </div>
    </body>
<html>