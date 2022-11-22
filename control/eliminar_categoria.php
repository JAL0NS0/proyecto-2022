<?php
    include("./config/constantes.php");

    $categoria = $_GET["nombre"];

    $query = "DELETE FROM tudi.categoria WHERE nombre='$categoria'";

    if ($conn->query($query) === TRUE) {
        header("Location: ./control.php");   
    } else {
        echo "Error al eliminar la caracteristica con codigo $codigo";
    }
?>