<?php
    include("config/constantes.php");
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

