<?php
 echo "HOLAAAAAAAAAAAAAAAAAA";

    
    $host= "tudi-server.mysql.database.azure.com";
    $username = "admin4254";
    $password = "proyecto-2022";
    $db_name = "tudi";

    $conn = mysqli_init(); 

    mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    echo "Aquí: 13"; 
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
    echo "Aquí: 15";
    if(mysqli_connect_errno()){
        die("Failed to connect to MySQL: ".mysqli_connect_error());
    }

    mysqli_close($conn);
?>
<br>

<a href="./select.php">IR AL SELECT</a>