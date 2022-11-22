<?php 
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();
    error_reporting(E_ALL);
        ini_set('display_errors', 'On');

    //Constantes

    //Fecha actual
    date_default_timezone_set('America/Guatemala');
    //Tipos de selectores y valores
    $nombresInput = array("Selector","Texto");
    $nombresSelector = array("Unico","Multiple");
    $separacionesTexto = array("Por letra","Por palabra","Costo total");

    //conexión con db
    $host= "tudi-server.mysql.database.azure.com";
    $username = "admin4254";
    $password = "proyecto-2022";
    $db_name = "tudi";
    $pagina = "https://tudi.azurewebsites.net";

    // Create connection
    $conn = mysqli_init(); 
    mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
    
    
    // Check connection
    if(mysqli_connect_errno()){
        die("Failed to connect to MySQL: ".mysqli_connect_error());
    }
    //echo "Connected successfully";
?>