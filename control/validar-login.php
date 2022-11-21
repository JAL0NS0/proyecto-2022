<?php 

    include("config/constantes.php");

    $my_email = $_POST["email"];
    $my_pass = $_POST["pass"];
    

    $query = "SELECT * FROM `empleado` WHERE email='$my_email' and contrasena=md5('$my_pass');";


    $result = mysqli_query($conn, $query);

    $filas = mysqli_num_rows ( $result );
    
    if($filas > 0){
        $_SESSION["email"]= $my_email;
        $row = mysqli_fetch_assoc($result);
        $_SESSION["nombre"]= $row['nombre'];
        $_SESSION["cargo"]= $row['cargo'];
        header('Location: https://tudi.azurewebsites.net/control/control.php');
    }else{
        header("Location: index.php?reg=false");
    }
?>