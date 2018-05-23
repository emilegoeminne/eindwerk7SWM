<?php
include ('includes/db_conn.php');
if(isset($_POST['naam'])&&isset($_POST['wachtwoord'])&&isset($_POST['email'])){
    $naam = $_POST['naam'];
    // Escape user inputs for security
    $query_checkuser = "SELECT * FROM login WHERE naam='$naam'";
 
    //voer query uit
 
    if($query_checkuser === $_POST['naam'] ) {
    echo "gebruiker bestaat reeds";
    exit;
    }
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

        $to = $email;
        $subject = "Mail Activatie";
        $last_id = mysqli_insert_id($conn);
        include('verify.php');
        

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <goeminnee@visocloud.org>' . "\r\n";
        $headers .= 'Cc: emile.goeminne@gmail.com' . "\r\n";

        if(mail($to,$subject,$message,$headers)){
            echo "<p>mail verstuurd</p>";
        } else {
            echo "<p>Fout bij het versturen van e-mail</p>";
        }
    
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
// close connection
mysqli_close($conn);
?>