<?php
include ('includes/db_conn.php');
session_start();
if(isset($_POST['subject'])&&isset($_POST['message'])){
    // Escape user inputs for security
    $sql = "SELECT * FROM login";
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
        if (!$result = mysqli_query($conn,$sql)) {
            echo "FOUT: Query kon niet uitgevoerd worden";
            exit;
        }


        // stap 3: De resultaten naar het scherm schrijven

        if (mysqli_num_rows($result) > 0) {
            while ($rij = mysqli_fetch_array($result)) {

                $to = $rij['email'];
                $subject = $_POST['subject'];
                $last_id = mysqli_insert_id($conn);
                $message = $_POST['message'];
                $count = 0;
                $ok = 0;

                $count = $count + 1;
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <goeminnee@visocloud.org>' . "\r\n";
                $headers .= 'Cc: emile.goeminne@gmail.com' . "\r\n";
                if (mail($to, $subject, $message, $headers)){
                    $ok = 1;
                }
            }
            if ($ok === 1) {
                echo mysqli_num_rows($result)."<p>mails verstuurd</p>";
            } else {
                echo "<p>Fout bij het versturen van e-mail</p>";
            }
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
// close connection
mysqli_close($conn);
?>