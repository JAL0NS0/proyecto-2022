<?php 
    include("./config/constantes.php");

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contraseña = $_POST["contrasena"];
    $cargo = $_POST["cargo"];

    $query = "INSERT INTO `tudi`.`empleado`    (`email`,    `nombre`,    `contrasena`,    `cargo`)
    VALUES     ('$email', '$nombre',md5('$contraseña'),'$cargo');";

    if ($conn->query($query) === TRUE) {
        header("Location: control.php");                        
    } else {
    echo "ERROR AL INSERTAR CATEGORIA $nombre.";
    echo "<a href='./control.php'>Volver</a>";
    }
?>