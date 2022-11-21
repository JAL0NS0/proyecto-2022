<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUDI control-productos</title>
    <!-- Favicon -->
    <?php include('./element/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./style/header-2.css">
    <link rel="stylesheet" href="./style/control.css">
    <link rel="stylesheet" href="./style/productos.css">
</head>
<body>
    <?php include("./config/constantes.php") ?>
    <?php include('./element/header-2.php');
        $_SESSION["menu"]=2;
    ?>

    <main>
        <div class="d-flex">
            <?php include("./element/lateral.php") ?>
            
            <div id="contenido">
                <div class="container my-3 p-5" id="productos">
                    <div class="row d-flex justify-content-between">
                        <div class="col-9 m-0">
                            <h3 class="m-0">Productos</h3>
                        </div>
                        <div class="col-9 text-center">
                            <a href="./nuevo-producto.php" class="btn btn-primary">Nuevo Producto</a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <table class="table table-striped">
                            <thead class="text-align-centar table-dark">
                                <tr>
                                <th scope="col">Código</th>
                                <th scope="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                                        <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                    </svg>
                                </th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio Base</th>
                                <th scope="col">Modificacion</th>
                                <th scope="col">Categorias</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                    $query = "SELECT * FROM producto;";

                                    $productos = $conn->query($query);
                                    if($productos->num_rows > 0){
                                        while(  $producto = $productos->fetch_assoc() ){
                                            echo "<tr>";
                                            echo "<th scope='row' class='text-center'>". $producto['id'] ."</th>";
                                            echo "<td>";
                                            if(!($producto['imagen']==null)){
                                                echo '<img src="../subidos/'.$producto['imagen'].'" style="height: 50px;" alt="'.$producto['imagen'].'">';
                                            }else{
                                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="50" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                                                            <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                                    </svg>';
                                            }
                                            echo "</th>";
                                            
                                            echo "<td>". $producto["nombre"]."</td>
                                            <td> Q.". $producto["precio_base"]."</td>
                                            <td>". $producto["modificacion"]."</td>";
                                            echo "<td>";
                                            $query = "SELECT * FROM pertenece WHERE productoid=".$producto['id'];
                                            $perteneciente = $conn->query($query);
                                            if($perteneciente->num_rows > 0){
                                                if($pertenece = $perteneciente->fetch_assoc()){
                                                    echo $pertenece['categoria'];
                                                }
                                                while(  $pertenece = $perteneciente->fetch_assoc()){
                                                    echo ",".$pertenece['categoria'];
                                                }
                                            }else{
                                                echo "SIN CATEGORIA";
                                            }
                                            echo "</td>";
                                            echo "<td> 
                                                <a class='btn btn-warning' href='editar-producto.php?id=". $producto['id'] ."'>".
                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>'."
                                                </a> 
                                            </td>
                                            <td> <a class='btn btn-danger'href='eliminar-producto.php?id=". $producto['id'] ."'>".'
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>'."
                                            </a>  
                                            </td>
                                            </td>";
                                            
                                        }   

                                    }else{
                                        echo "<td colspan='8'>Sin productos para mostrar</td>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Bootstrap json -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- Mis Scripts -->
<script src="js/dom.js"></script>
</html>