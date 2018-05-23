
<?php
session_start(); // Altijd nodig om te starten ook op andere paginasQ
include("includes/db_conn.php");
if(!isset($_SESSION['name'])){
    if(isset($_POST['naam']) && isset($_POST['wachtwoord']) && isset($_POST['email']) ){
        // Escape user inputs for security
        $_POST['naam'] = mysqli_real_escape_string($conn, $_POST['naam']);
        $_POST['wachtwoord'] = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
        $_POST['email'] = mysqli_real_escape_string($conn, $_POST['email']);
        $_POST['id'] = (int) $_POST['id'];
        $_POST['rank'] = (int) $_POST['rank'];
        $naam = $_POST['naam'];
        $wacht = md5($_POST['wachtwoord']);
        $email = $_POST['email'] ;
        // attempt insert query execution
        $sql = "INSERT INTO login (naam, wachtwoord, email) VALUES ('$naam', '$wacht', '$email' )";
        if(mysqli_query($conn, $sql)){
            echo "Records added successfully.";
            header("Location:admin.php");
            exit;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    // close connection
    }
}
else{
    header("Location:index.php");
    exit;
}
mysqli_close($conn);
?>