<?php
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();

    //echo "INICIO SESSION <br>";

    //conexión con db
    $host= "tudi-server.mysql.database.azure.com";
    $username = "admin4254";
    $password = "proyecto-2022";
    $db_name = "tudi";
    $pagina = "https://tudi.azurewebsites.net";

    $conn = mysqli_init();
    //echo "QUE PASÓ"; 
    mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    //echo "AQUÍ";
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
    //echo "SE ACABÓ <br>";
    
    // Check connection
    if(mysqli_connect_errno()){
        die("Failed to connect to MySQL: ".mysqli_connect_error());
    }

    //echo "HIZO LA CONECCION <br>";

    $id =$_GET["id"];

    //echo "GET ID <br>";

    $query="DELETE FROM pertenece WHERE productoid =$id";

    if (!$conn->query($query)) {
        echo "Error al eliminar el producto con codigo $id";
    }

    $query="DELETE FROM producto WHERE id=$id";

    if ($conn->query($query)) {
        header("Location: productos.php");   
    } else {
        echo "Error al eliminar el producto con codigo $id";
    }
?>

