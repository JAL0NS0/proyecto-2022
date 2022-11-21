<?php
    include("./config/constantes.php");

    $id = $_GET["id"];

    $query = "DELETE FROM tudi.caracteristica WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        echo "Eliminado";
        header("Location: editar-producto.php?id=".$_SESSION['id']);   
    } else {
        echo "Error al actualizar la caracteristica $nombre_car";
    }
?>