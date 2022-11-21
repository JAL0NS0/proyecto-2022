<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUDI control-nuevo producto</title>
    <!-- Favicon -->
    <?php include('./element/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./style/header-2.css">
    <link rel="stylesheet" href="./style/control.css">
    <link rel="stylesheet" href="./style/editar-producto.css">
</head>
<body>
    <?php include("./config/constantes.php") ?>
    <?php include('./element/header-2.php');
        $_SESSION["menu"]=2;
    ?>

    <main>
        <div class="d-flex">
            <?php include("./element/lateral.php")?>

            <div id="contenido">
                <div class="container my-3 p-5" id="productos">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3 m-0">
                            <h3 class="m-0">Editar Producto</h3>
                        </div>
                        <div class="col-2 text-center">
                            <a href="./productos.php" class="btn btn-danger">Volver</a>
                        </div>
                    </div>
                    <div class="row mt-2 d-flex">
                        <h3 class="w-50">
                            <?php
                                $id = $_GET["id"];
                                $_SESSION['id']=$id;
                                $query = "SELECT * FROM Producto WHERE id = $id";

                                if(!$datos_generales = $conn->query($query)){
                                    header("Location: productos.php");
                                };
                                if(!($datos_generales->num_rows > 0)){
                                    header("Location: productos.php");
                                }
                                $datos_producto = $datos_generales->fetch_assoc();
                                echo $datos_producto["nombre"];
                            ?></h3>
                        <a href="" class="btn btn-crear w-25">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Editar datos generales
                        </a>
                    </div>
                    <div class="row datos py-3 datos-generales">
                        <div class="col-7">
                            <ul>
                                <li class="d-flex px-3">
                                    <span class="titulo">Código</span>:
                                    <span class="significado"><?php echo $id ?></span>
                                </li>
                                <li class="d-flex px-3">
                                    <span class="titulo">Descripcion</span>:
                                    <span class="significado"><?php echo $datos_producto['descripcion']; ?></span>
                                </li>
                                <li class="d-flex px-3">
                                    <span class="titulo">Precio Base</span>:
                                    <span class="significado"><h3><?php echo "Q.".$datos_producto['precio_base']; ?></h3></span>
                                </li>
                            </ul>
                        </div> 
                        <div class="col text-center">
                            <?php 
                            if($datos_producto["imagen"] == null){
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="200px" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                                                            <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                                    </svg>';
                            }else{
                                echo "<img src='../subidos/".$datos_producto["imagen"]."' alt='".$datos_producto["imagen"]."'>;";
                            }
                            
                            ?>
                        </div>
                    </div>
                    <div class="row px-5 caracteristicas">
                        <div class="d-flex justify-content-between mb-3">
                            <h3>Caracteristicas</h3>
                            <button type="button" class="btn btn-crear" data-bs-toggle="modal" data-bs-target="#nuevoModal">
                                Nueva Caracteristica
                            </button>

                            <?php include("./element/modal-nueva-caracteristica.php"); ?> 
                        </div>                 
                        <?php include("./element/listado-caracteristicas.php"); ?>
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
<script src="js/agregar_campos.js"></script>
</html>