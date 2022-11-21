<?php 
    session_start();
    unset($_SESSION['nombre']);
    unset($_SESSION['email']);
    session_unset();

    header("Location: index.php");
?>