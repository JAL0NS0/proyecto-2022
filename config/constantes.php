<?php 
    session_start();

    //Constantes

    //conexión con db
    $servername = "localhost";
    $username = "root";
    $password = "al0ns0";
    $dbname = "tudi";

    //Tipos de selectores y valores
    $nombresInput = array("Selector","Texto");
    $nombresSelector = array("Unico","Multiple");
    $nombresValor = array("Base+Costo");
    $separacionesTexto = array("Por letra","Por palabra","Costo total");
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
?>