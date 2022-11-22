<?php
        include('config/constantes.php');
        
        
        if( isset($_POST['datos']) ){
            $nombre = $_POST['nombre_producto'];
            $descripcion = $_POST['descripcion'];
            $costo_base = $_POST['costo_base'];
            $categoria = $_POST['categoria'];
            
            $directorio = 'subidos';
            $file = $_FILES['imagen'];
            $tipos_permitidos = array('image/jpg', 'image/jpeg', 'image/png');

            $query = "SELECT * FROM producto WHERE nombre='$nombre'";
            $result = $conn->query($query);
            if(mysqli_num_rows ( $result ) > 0){
                header("Location: nuevo-producto.php?error=1");
            };


            if(isset($file) && $file['error'] == 0){
                $foto_nombre = $file['name'];
                $tipo = $file['type'];

                if(in_array($tipo,$tipos_permitidos)){

                    move_uploaded_file($file['tmp_name'], '../subidos/'.$foto_nombre);

                    $_SESSION['nombre_producto']= $nombre;
                    $query = "INSERT INTO `tudi`.`producto` (`nombre`,`descripcion`,`modificacion`,`imagen`,`precio_base`,`solicitudes`)
                    VALUES ('$nombre','$descripcion','".date('Y-m-d h:i:s', time())."','$foto_nombre',$costo_base,0);";

                    if ($conn->query($query)) {
                        $_SESSIO['id'] = $conn->insert_id;
                        $query = "INSERT INTO `tudi`.`pertenece`(`productoid`,`categoria`)
                        VALUES(".$_SESSIO['id'].",'$categoria');";
                        
                        $query2 = "UPDATE `tudi`.`categoria`
                        SET num_productos = num_productos+1 WHERE `nombre` = '$categoria';";

                        if ($conn->query($query) and $conn->query($query2)) {
                            die();
                            header("Location: editar-producto.php?id=".$_SESSIO['id']);
                        }else{
                            echo "Error: " . $query . "<br>" . $conn->error;
                            echo "<a href='./productos.php'>Siguiente Paso</a>";
                        }                                              
                    } else {
                        echo "Error: " . $query . "<br>" . $conn->error;
                        echo "<a href='./productos.php'>Siguiente Paso</a>";
                    }
                }else{
                    echo "No es un tipo de imagen permitido <br>
                        <a href='./nueva-empresa.php?error=2'>Volver/a>";
                }
            }else{
                echo "No se subio ninguna imagen
                <a href='./nueva-empresa.php?error=2'>Volver/a>";
            }
            
        }else{
            echo "Usted no tiene permiso";
            echo "<a href='../index.php'> Salga de aquí </a>";
        }   
    ?>