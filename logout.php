<?php 
    include('config/constantes.php');
    unset($_SESSION['nombre']);
    unset($_SESSION['email']);
    session_unset();

    header("Location: index.php");
?>