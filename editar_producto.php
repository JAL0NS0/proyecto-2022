<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('config/constantes.php');

        $nombre_producto = $_SESSION['nombre_producto'];
        echo $nombre_producto;
        echo "<br>";
        

        $sql = "SELECT id, nombre, descripcion, costo_base FROM Producto WHERE Nombre='$nombre_producto'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " <br>-Name: " . $row["nombre"]. " <br>" . $row["descripcion"]. " <br>" . $row["costo_base"]. "<br>";
            $Producto_id = $row["id"];
            $_SESSION['id']=$Producto_id;
        }
        } else {
            echo "ERROR";
            die();
        }
    ?>
    <br>
    <br>

    <div>
        <?php 
            $sql = "SELECT `nombre`,`Orden`,`Producto_id`,`input_type`
                    FROM `selector` WHERE Producto_id = $Producto_id ORDER BY Orden;";
            $result = $conn->query($sql);

            $_SESSION['product_options']=$result->num_rows;
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<b>".$row["Orden"]. ". " . $row["nombre"]. " Typo: " . $row["input_type"]. "</b>"."<br>";
                    
                    $sql2 = "SELECT descripción FROM valor WHERE Producto='$Producto_id' and nombre_selector= '". $row['nombre']."'";
                    $result2 = $conn->query($sql2);
                    echo "Opciones: <br>";
            
                    if ($result2->num_rows > 0) {
                    // output data of each row
                        while($row2 = $result2->fetch_assoc()) {
                            echo $row2['descripción']. "<br>";
                        }
                    }
                    echo "<br>";
                }
            } else {
                echo "SIN CAMPOS EDITABLES";
            }
        ?>
    </div>
    <a href="nuevo_campo.php">Nuevo campo</a>
</body>
</html>