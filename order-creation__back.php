
<?php
include("includes/db_conn.php");
session_start(); // Altijd nodig om te starten ook op andere paginasQ

    if(!empty($_SESSION['winkelwagen'])){    
        // Escape user inputs for security
        $_POST['inputName'] = mysqli_real_escape_string($conn, $_POST['inputName']);
        $_POST['inputStreet'] = mysqli_real_escape_string($conn, $_POST['inputStreet']);
        $_POST['inputCity'] = mysqli_real_escape_string($conn, $_POST['inputCity']);
        $_POST['inputCountry'] = mysqli_real_escape_string($conn, $_POST['inputCountry']);
        $_POST['id'] = (int) $_POST['id'];
        $_POST['inputPostcode'] = (int) $_POST['inputPostcode'];

        $naam = $_POST['inputName'];
        $street = $_POST['inputStreet'];
        $city = $_POST['inputCity'] ;
        $country = $_POST['inputCountry'] ;
        $postcode = $_POST['inputPostcode'] ;
        $email = $_SESSION['email'];
        $id = $_POST['id'];
        $cart = array();
        $amount =  array();
        $real_total = $_SESSION['rtotal'];

        // attempt insert query execution
        foreach($_SESSION['winkelwagen'] as $key => $val){

            mysqli_query($conn, $sql = "INSERT INTO order_product (name, total, street, postcode, city, country, id, amount, product, email) VALUES ('$naam', '$real_total', '$street', '$postcode', '$city', '$country', '$id', '$val', '$key', '$email')");
            $_SESSION['lastId'] [$_POST['insertId']] = mysqli_insert_id($conn);
            echo "Records added successfully.";
        } // afsluiten foreach
        header("Location:order-payment.php");
        unset($_SESSION['winkelwagen']);
        exit;
        if(!mysqli_query($conn, $sql)){
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }else{
        header("Location:error.php");
    }
    // close connection
    mysqli_close($conn);
    ?>