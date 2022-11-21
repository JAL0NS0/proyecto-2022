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
    <link rel="stylesheet" href="./style/productos.css">
</head>
<body>
    <?php include("./config/constantes.php"); ?>
    <?php include('./element/header-2.php');
        $_SESSION["menu"]=2;
    ?>

    <main>
        <div class="d-flex">
            <?php include("./element/lateral.php") ?>
            <div id="contenido">
                <div class="container my-3 p-5" id="productos">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3 m-0">
                            <h3 class="m-0">Nuevo Producto</h3>
                        </div>
                        <div class="col-2 text-center">
                            <a href="./productos.php" class="btn btn-primary">Cancelar</a>
                        </div>
                    </div>
                    <div class="row mt-2 w-75 m-auto">
                        <form action="guardar-datos-generales.php" method="POST" enctype='multipart/form-data' id="formulario_producto">
                            <div>
                                <div>
                                    <h4>Datos basicos</h4>
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-floating">
                                        <input required type="text" name="nombre_producto" id="nombre_producto" autocomplete='off' placeholder='Nombre del producto' class="form-control">
                                        <label for="nombre_producto">Nombre de Producto</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="imagen">Imagen del producto</label>
                                        <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="tipo_valor">Categoria</label>
                                            <?php
                                                $query = "SELECT * FROM categoria;";

                                                $categorias = $conn->query($query);
                                                if($categorias->num_rows > 0){
                                                    ?>
                                                        <select name="categoria" id="categoria" class="form-select" aria-label="Default select example">
                                                    <?php
                                                    while(  $categoria = $categorias->fetch_assoc() ){
                                                        echo "<option value='".$categoria['nombre']."'>
                                                            ".$categoria['nombre']."
                                                        </option>";
                                                    }
                                                }else{
                                                    ?>
                                                        <select disabled name="tipo_valor" id="tipo_valor" class="form-select" aria-label="Default select example">
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>                                   
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-floating">
                                        <textarea   form="formulario_producto" 
                                                    placeholder="Leave a comment here" 
                                                    id="descripcion" 
                                                    name="descripcion"
                                                    class="form-control" 
                                                    style="height: 100px"></textarea>
                                        <label for="descripcion">Descripcion del producto</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Q</span>
                                        <div class="form-floating">
                                            <input class="w-50 form-control" type="number" name="costo_base" id="costo_base" placeholder="costo" step="0.01" min="0">
                                            <label for="costo_base">Costo base</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="submit" class="btn w-100 btn-primary mt-3" value="Guardar" name="datos"/>
                        </form>
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