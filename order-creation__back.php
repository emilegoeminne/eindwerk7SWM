
<?php
session_start(); // Altijd nodig om te starten ook op andere paginasQ
include("includes/db_conn.php");
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
        $id = $_POST['id'];
        $cart = implode(' ||| ', array_keys($_SESSION['winkelwagen']));
        $amount =  implode(' ||| ', array_values($_SESSION['winkelwagen']));
        $real_total = $_SESSION['rtotal'];

        // attempt insert query execution
        $sql = "INSERT INTO order_product (name, total, street, postcode, city, country, id, product_dsc, product) VALUES ('$naam', '$real_total', '$street', '$postcode', '$city', '$country', '$id', '$amount', '$cart' )";
        if(mysqli_query($conn, $sql )){
            echo "Records added successfully.";
            unset($_SESSION['winkelwagen']);
            header("Location:admin.php");
            exit;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    // close connection
mysqli_close($conn);
?>