<?php
    include ('includes/db_conn.php');
    session_start();
    if(isset($_POST['inputName'])&&isset($_POST['inputEmail'])&&isset($_POST['inputMessage'])){

        $to = "goeminnee@visocloud.org";
        $subject = 'Contact form filled in';
        $message = $_POST['inputMessage'];
        include('contact_message.php');

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <goeminnee@visocloud.org>' . "\r\n";
        $headers .= 'Cc: emile.goeminne@gmail.com' . "\r\n";
        if (mail($to, $subject, $finalMessage, $headers)){
            $ok = 1;
        }
    } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    // close connection
    mysqli_close($conn);
?>