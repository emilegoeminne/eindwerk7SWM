<?php
include("includes/db_conn.php");
session_start();  
//toevoegen aan sessie
if (!empty($_POST['toevoegen']) ) {        
    $_SESSION['winkelwagen'] [$_POST['product_id']] = $_POST['amount'];
}
    
header("Location:order-cart.php");
?>