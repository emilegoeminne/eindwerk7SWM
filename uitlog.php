<?php
    session_start(); // Altijd nodig om te starten ook op andere paginas
    session_unset();
    session_destroy();
    header('Location: index.php')
?>
