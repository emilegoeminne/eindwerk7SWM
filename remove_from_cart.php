<?php 
session_start();
echo "<pre>"; print_r($_SESSION['winkelwagen']);
unset($key);
echo "<pre>";print_r($_SESSION);
?>