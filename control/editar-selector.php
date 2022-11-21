<?php
    include("./config/constantes.php");
    var_dump($_POST);
 
    $producto_id = $_SESSION['id'];
    $tipo_seleccion = $_POST['tipo_seleccion'];
    $id=$_GET["id"];

    $query = "DELETE FROM tudi.selector WHERE id=".$id;
    if (!$conn->query($query) === TRUE) {
        echo "Error al actualizar la caracteristica $nombre";
        die();
    }
    
    $sql = "INSERT INTO `tudi`.`selector`(`id`,`tipo_selector`)
            VALUES ($id,$tipo_seleccion);";

    if (!$conn->query($sql)) {
        echo "Error al insertar caracteristica: " . $sql . "<br>" . $conn->error;
        echo "<a href='editar-producto.php?id=$producto_id'> Salga de aquí </a>";
        die();
    }

    $selector_id=mysqli_insert_id($conn);

    if( isset( $_POST['descripciones'.$id] ) ){
        foreach ($_POST['descripciones'.$id] as $index => $descripcion) {
            $valor = $_POST['valores'.$id][$index];

            $sql = "INSERT INTO `tudi`.`opcion` (`nombre`,`costo`,`selectorid`)
                VALUES('$descripcion',$valor,$id);";
            
            if (! $conn->query($sql)) {
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