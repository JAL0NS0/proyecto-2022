<?php
    include('config/constantes.php');

    echo var_dump($_SESSION);

    if( !isset($_SESSION['nombre'])){
        echo "ERROR!!! no ha iniciado sesión.";
        die();
    }

    $nombre = $_POST['nombre_caracteristica']; 
    $tipo_valor = $_POST['tipo_valor'];
    $producto_id = $_SESSION['id'];
    $tipo_seleccion = $_POST['tipo_seleccion'];

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

    $sql = "INSERT INTO `tudi`.`selector`(`id`,`tipo_selector`)
            VALUES($caracteristica_id,$tipo_seleccion);";

    if (!$conn->query($sql)) {
        echo "Error al insertar Selector: " . $sql . "<br>" . $conn->error;
        echo "<a href='editar-producto.php?id=$producto_id'> Salga de aquí </a>";
        die();
    }

    if( isset( $_POST['descripciones'] ) ){
        foreach ($_POST['descripciones'] as $index => $descripcion) {
            $valor = $_POST['valores'][$index];

            $sql = "INSERT INTO `tudi`.`opcion`(`nombre`,`costo`,`selectorid`)
                    VALUES ('$descripcion',$valor,$caracteristica_id);";
            
            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error . " Guardando Opcion $descripcion = $valor guardado correctamente.";
            }
        }
        header("Location: editar-producto.php?id=$producto_id");
    }else{
        echo "Error no esta definido las descripciones de las opciones <br>";
        echo "<a href='editar-producto.php?id=$producto_id'> Salga de aquí </a>";
        die();
    }

    $conn->close();
?>