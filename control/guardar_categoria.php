<?php
    include("./config/constantes.php");

    $nombre = $_POST["nombre_categoria"];

    $query = "SELECT * FROM categoria WHERE nombre = '$nombre'";

    $resultado = $conn->query($query);

    if($resultado->num_rows > 0){
        echo "CATEGORIA $nombre YA EXISTE";
        echo "<a href='./control.php'>Volver</a>";
    }

    $query = "INSERT INTO `tudi`.`categoria` (`nombre`,`num_productos`)
                VALUES('$nombre',0);";
    
    if ($conn->query($query) === TRUE) {
        header("Location: control.php");                        
    } else {
        echo "ERROR AL INSERTAR CATEGORIA $nombre.";
        echo "<a href='./control.php'>Volver</a>";
    }

?>