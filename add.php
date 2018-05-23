
<?php
session_start(); // Altijd nodig om te starten ook op andere paginas
include("includes/db_conn.php");
if(!isset($_SESSION['name']) && !$_SESSION['rank'] == 2){
    header("Location:index.php");
    exit;
}
    if(isset($_POST['naam']) && isset($_POST['description']) && isset($_POST['tags']) && isset($_POST['prijs'])){
        // Escape user inputs for security
        $_POST['naam'] = mysqli_real_escape_string($conn, $_POST['naam']);
        $_POST['description'] = mysqli_real_escape_string($conn, $_POST['description']);
        $_POST['tags'] = mysqli_real_escape_string($conn, $_POST['tags']);
        $_POST['prijs'] = mysqli_real_escape_string($conn, $_POST['prijs']);
        $_POST['waardering'] = mysqli_real_escape_string($conn, $_POST['waardering']);
        $_POST['prijs'] = (int) $_POST['prijs'];
        $_POST['product_id'] = (int) $_POST['product_id'];
        $_POST['aankoopdatum'] = (int) $_POST['aankoopdatum	'];
        $naam = $_POST['naam'];
        $desc = $_POST['description'];
        $tags = $_POST['tags'] ;
        $prijs = $_POST['prijs'];
        $waardering = $_POST['waardering'];
        // attempt insert query execution
        $sql = "INSERT INTO producten (naam, description, tags, prijs, waardering) VALUES ('$naam', '$description', '$tags', '$prijs', '$waardering' )";
        if(mysqli_query($conn, $sql)){
            echo "Records added successfully.";
            header("Location:admin.php");
            exit;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    // close connection
    }
mysqli_close($conn);
?>