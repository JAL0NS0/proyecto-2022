<?php include('config/constantes.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Favicon -->
    <?php include('./elementos/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./style/header-1.css">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>
<body>
    <?php
        include('./elementos/header-1.php');

        if(isset($_SESSION['nombre'])){
            $nombre = $_SESSION["nombre"];
            $email = $_SESSION["email"];
        }
    ?>

    <main>
        <section class="my-carusel">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active con-fondo" id="primero">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Busca entre diversas categoriass</h5>
                            <a href="./categorias.php" class="btn btn-primary">Categorias</a>
                        </div>
                    </div>
                    <div class="carousel-item con-fondo" id="segundo">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Ten un presupuesto inmediatamente</h5>
                            <a href="./buscar.php" class="btn btn-primary">Productos</a>
                        </div>
                    </div>
                    <div class="carousel-item con-fondo" id="tercero">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Ahorras tiempo y esfuerzo</h5>
                            <a href="./categorias.php" class="btn btn-primary">Más pedidos</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section>
            <div class="container w-75">
                <div class="row">
                    <?php
                        if(isset($email)){
                            ?>  <h1>Hola <?php echo $nombre ?></h1>
                                <h2><?php echo $email ?></h2>
                            <?php
                        }else{
                            ?><h1>Bienvenido</h1><?php
                        }
                    ?>                    
                </div>
            </div>
        </section>
        <section class=" seccion categorias py-4">
            <div class="w-75 mx-auto">
                <div class="row">
                    <h3>Nuestras categorias</h3>
                </div>
                <div class="row">
                    <?php 
                        $query = "SELECT * FROM tudi.categoria ORDER BY num_productos DESC LIMIT 0,9";
                        $categorias = $conn->query($query);
                        while($categoria = $categorias->fetch_assoc()){
                            ?>
                            <div class="col-sm-6 col-lg-4 my-2">
                                <div class="categoria_bloque text-center">
                                    <a href="./buscar.php?cat=<?php echo $categoria['nombre'] ?>"><?php echo $categoria['nombre'] ?></a>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <section class="seccion">
            <div class="row m-0 w-100 pb-3">
                <div class="col-7 div_imagen">
                    <img class="img-fluid" src="./img/arma.jpg" alt="arma">
                </div>
                <div class="col-5 pt-3">
                    <?php $query = "SELECT * FROM tudi.producto ORDER BY solicitudes";
                    $productos = $conn->query($query);
                    $producto = $productos->fetch_assoc();
                    $id = $producto['id'];
                        ?>
                            <div class=" bg-light block-4 text-center">
                                <figure class="block-4-image">
                                    <a href="./producto.php?id=<?php echo $producto['id']?>"><img src="./subidos/<?php echo $producto['imagen']?>" alt="<?php echo $producto['imagen']?>" class="img-fluid"></a>
                                </figure>
                                <div class=" bg-light block-2-text p-4">
                                    <h3><a href="./producto.php?id=<?php echo $producto['id']?>"><?php echo $producto['nombre']?></a></h3>
                                    <div class="row mb-0">
                                    <div class="text-truncate">
                                        <?php echo $producto['descripcion']?>
                                    </div>
                                    </div>
                                    <p class="text-primary font-weight-bold">Precio base: Q<?php echo $producto['precio_base']?></p>
                                </div>
                            </div>
                            <div class="row w-50 mx-auto mt-3">
                                <a class="btn btn-crear" href="./producto.php?id=<?php echo $id ?>">Editar producto</a>
                            </div>
                        <?php
                    ?>
                </div>
            </div>
        </section>
        <section class="seccion">
            <div class="container">
                <div class="row">
                        <h3>Ultimos productos</h3>
                </div>
                <div class="row">
                    <?php $query = "SELECT * FROM tudi.producto ORDER BY solicitudes LIMIT 0,4";
                        $productos = $conn->query($query);
                        $productos = $conn->query($query);
                        while($producto = $productos->fetch_assoc()){
                          ?>
                              <div class="col-sm-6 col-lg-3 mb-4 producto">
                                  <div class=" bg-light block-4 text-center border">
                                  <figure class="block-4-image">
                                      <a href="./producto.php?id=<?php echo $producto['id']?>"><img src="./subidos/<?php echo $producto['imagen']?>" alt="<?php echo $producto['imagen']?>" class="img-fluid"></a>
                                  </figure>
                                  <div class=" bg-light block-2-text p-4">
                                      <h3><a href="./producto.php?id=<?php echo $producto['id']?>"><?php echo $producto['nombre']?></a></h3>
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
                    ?>
                </div>                
            </div>
        </section>
    </main>
    
    <?php
        include('./elementos/footer.php');
    ?>
</body>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Bootstrap json -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- Mis Scripts -->
<script src="js/dom.js"></script>
</html>