<?php

$host= "tudi-server.mysql.database.azure.com";
$username = "admin4254";
$password = "proyecto-2022";
$db_name = "tudi";

$conn = mysqli_init(); 
mysqli_ssl_set($conn,NULL,NULL, ".\DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);

if(mysqli_connect_errno()){
    die("Failed to connect to MySQL: ".mysqli_connect_error());
}

printf("Reading data from table: \n");
$res = mysqli_query($conn, "SELECT * FROM producto");
while($row = mysqli_fetch_assoc($res)){
    var_dump($row);
}


mysqli_close($conn);
?>
