<?php
    include("./config/constantes.php");
    
    $nombre = $_POST["nombre_caracteristica"];
    $long_min = $_POST["long_min"];
    $long_max = $_POST["long_max"];
    $tipo_costo = $_POST["tipo_costo"];
    $costo = $_POST["costo"];
    $producto_id = $_SESSION["id"];
    $id=$_GET["id"];
    
    $sql = "UPDATE `tudi`.`texto` SET
            `costo` = $costo,
            `maximo` = $long_max,
            `minimo` = $long_min,
            `separacion` = $tipo_costo
            WHERE `id` = $id;";

    if (!$conn->query($sql)) {
        echo "Error al insertar caracteristica: " . $sql . "<br>" . $conn->error;
        echo "<a href='editar-producto.php?id=$producto_id'> Salga de aquí </a>";
        die();
    }
    header("Location: editar-producto.php?id=$producto_id");

    $conn->close();
?>