<?php
    include('./config/constantes.php');

    $my_email = $_POST["email"];
    $my_pass = $_POST["pass"];

    echo "Email: ".$my_email."";

    $query = "SELECT * FROM usuario WHERE email='$my_email' and contrasena='$my_pass';";

    echo $query;
    $result = $conn->query($query);
    $filas = $result->num_rows;
    if($filas > 0){
        $_SESSION["email"]= $my_email;
        $row = $result->fetch_assoc();
        $_SESSION["nombre"]= $row['nombre'];
        header("Location: index.php");
    }else{
        header("Location: login.php?reg=false");
    }
?>