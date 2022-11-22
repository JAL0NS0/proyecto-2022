<?php
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();


    $conn = mysqli_init(); 
    mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
    
    
    // Check connection
    if(mysqli_connect_errno()){
        die("Failed to connect to MySQL: ".mysqli_connect_error());
    }

    $id =$_GET["id"];


    $query="DELETE FROM pertenece WHERE productoid =$id";

    if (!$conn->query($query)) {
        echo "Error al eliminar el producto con codigo $id";
    }

    $query="DELETE FROM producto WHERE id=$id";

    if ($conn->query($query)) {
        header("Location: ./productos.php");   
    } else {
        echo "Error al eliminar el producto con codigo $id";
    }
?>

