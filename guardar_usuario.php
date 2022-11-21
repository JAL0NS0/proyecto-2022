<?php 
    include('./config/constantes.php');

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM usuario WHERE email='$email'";
    $result = $conn->query($query);

    echo $query;

    if ($result->num_rows > 0) {
        header("Location: nuevo_usuario.php?insert=1");
    } else {
        $query = "INSERT INTO `usuario`(`email`,`nombre`,`contrasena`,`edad`) VALUES('$email','$nombre','$pass',$edad);";
        $result = $conn->query($query);

        if($result){
            header("Location: nuevo_usuario.php?insert=2");
        }else{
            header("Location: nuevo_usuario.php?insert=3");
        }
        //header("Location: nuevo_usuario.php?insert=2");
    }

    mysqli_close($conn);

?>