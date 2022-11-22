<?php
    include('config/constantes.php');

    if( !isset($_SESSION['nombre'])){
        echo "ERROR!!! no ha iniciado sesión.";
        die();
    }
    $nombre = $_POST["nombre_caracteristica"];
    $long_min = $_POST["long_min"];
    $long_max = $_POST["long_max"];
    $tipo_costo = $_POST["tipo_costo"];
    $costo = $_POST["costo"];
    $producto_id = $_SESSION["id"];

    $sql = "SELECT * FROM tudi.caracteristica WHERE productoid=$producto_id AND nombre='$nombre';";

    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        echo "ERROR!!! Ya existe una caracteristica con ese nombre";
        echo "<a href='editar-producto.php?id=$producto_id'> Salga de aquí </a>";
        die();
    }

    $sql = "INSERT INTO `tudi`.`caracteristica` (`productoid`,`nombre`)
            VALUES($producto_id,'$nombre');";

    if (!$conn->query($sql)) {
        echo "Error al insertar caracteristica: " . $sql . "<br>" . $conn->error;
        echo "<a href='editar-producto.php?id=$producto_id'> Salga de aquí </a>";
        die();
    } 

    $caracteristica_id=mysqli_insert_id($conn);
    
    $sql = "INSERT INTO `tudi`.`texto`(`id`,`costo`,`maximo`,`minimo`,`separacion`)
            VALUES ($caracteristica_id,$costo,$long_max,$long_min,$tipo_costo);";

    if (!$conn->query($sql)) {
        echo "Error al insertar caracteristica: " . $sql . "<br>" . $conn->error;
        echo "<a href='editar-producto.php?id=$producto_id'> Salga de aquí </a>";
        die();
    }

    $selector_id=mysqli_insert_id($conn);
    header("Location: editar-producto.php?id=$producto_id");

    $conn->close();
?>