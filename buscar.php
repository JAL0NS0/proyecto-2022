<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <!-- Favicon -->
    <?php include('./elementos/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./style/header-1.css">
    <link rel="stylesheet" href="./style/todo.css">
    <link rel="stylesheet" href="./style/categorias.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>
<body>
    <?php 
        include('config/constantes.php');
        include('./elementos/header-1.php');
    ?>

    <main>
        <div class="container productos mb-5">
            
              <?php
                if( isset($_GET["s"])){
                    $buscar= $_GET["s"];

                    echo "<div class='row titulo'>
                            <div class='col'>
                                <h3> Buscando: $buscar <h3>
                            </div>
                        </div>  
                        <div class='row'>";

                    $query = "SELECT P.id, P.nombre, P.descripcion, P.modificacion, P.imagen, P.precio_base
                    FROM tudi.producto as P, tudi.categoria as C, tudi.pertenece as D 
                    WHERE D.categoria=C.nombre AND P.id=D.productoid AND ( P.nombre LIKE '%$buscar%' OR P.id LIKE '%$buscar%' OR P.precio_base LIKE '%$buscar%' OR P.descripcion LIKE '%$buscar%')
                    ORDER BY modificacion";
                    $productos = $conn->query($query);
                    while($producto = $productos->fetch_assoc()){
                        ?>
                            <div class="col-sm-6 col-lg-3 mb-4 producto">
                                <div class=" bg-light block-4 text-center border">
                                <figure class="block-4-image">
                                    <a href="./producto.php?id=<?php echo $producto['id']?>"><img src="./subidos/<?php echo $producto['imagen']?>" alt="<?php echo $producto['imagen']?>" class="img-fluid"></a>
                                </figure>
                                <div class=" bg-light block-2-text p-4">
                                    <h3><a style="text-decoration:none;color: black;" href="./producto.php?id=<?php echo $producto['id']?>"><?php echo $producto['nombre']?></a></h3>
                                    <div class="row mb-0">
                                    <div class="text-truncate">
                                        <?php echo $producto['descripcion']?>
                                    </div>
                                    </div>
                                    <p class="text-primary font-weight-bold">Precio base: Q<?php echo $producto['precio_base']?></p>
                                </div>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="container">
                        <div class="col text-center mt-5 h-100 vacio">
                            <h1>INGRESA UNA PALABRA PARA BUSCAR</h1>
                        </div>
                    </div>
                    <?php
                }
                

                ?>
            </div>
        </div>
    </main>
    <?php include('./elementos/footer.php');?>
</body>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Bootstrap json -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- Mis Scripts -->
<script src="js/dom.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</html>