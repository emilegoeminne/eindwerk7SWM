<?php
// initialisatie
define("DB_SERVER", "localhost");
define("DB_USER", "root"); 
define("DB_PASS", ""); //blanco voor XAMPP, dus "")
define("DB_NAME", "juicy3");

// stap 1a: verbinding maken met de database
if (!$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)) {
echo "Er kan geen verbinding met de DB worden gemaakt";
exit; 
}
?> 
