<?php include("config/constantes.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUDI control</title>
    <!-- Favicon -->
    <?php include('element/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./style/header-2.css">
    <link rel="stylesheet" href="./style/control.css">
</head>
<body>
    
    <?php include('element/header-2.php');
        $_SESSION["menu"]=1;
    ?>

    <main>
        <div class="d-flex">
            <?php include("./element/lateral.php") ?>
            
            <div id="contenido">
                <div class="container my-2 p-3 d-flex">
                    <div class="row w-100">
                        <div class="col-8">
                            <div class="row w-75 mx-auto mt-3 py-2 datos">
                                <div class="row">
                                    <div class="col-7">
                                        CATEGORIAS
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-crear " data-bs-toggle="modal" data-bs-target="#modal_categoria">Nueva Categoria</button>
                                    </div>
                                </div>
                                <div class="row mt-3 mx-auto">

                                    <table class="table text-center">
                                        <thead class="table-dark">
                                            <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">No.Productos</th>
                                            <th scope="col">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <?php
                                                $query= "SELECT * FROM categoria";

                                                $categorias = $conn->query($query);
                                                if($categorias->num_rows > 0){
                                                    while($categoria = $categorias->fetch_assoc()){
                                                        ?>
                                                        <tr>
                                                        <td><?php echo $categoria['nombre'] ?></td>
                                                        <td><?php echo $categoria['num_productos'] ?></td>
                                                        <td> <a href="eliminar_categoria.php?nombre=<?php echo $categoria['nombre'] ?>">Eliminar</a> </td>                                                        
                                                        </tr>
                                                        <?php
                                                    }                                            
                                                } else {
                                                    echo "<tr>
                                                    <td colspan='3'>SIN CATEGORIAS</td>
                                                    </tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>

                            <?php include("./element/modal-categorias.php")?>
                        </div>
                        <div class="col-4 mt-3" >
                        <div class="row datos">
                                <div class="row">
                                    <div class="col"><h3>personal</h3></div>
                                    <?php  if($_SESSION["cargo"] != 1){
                                            ?>
                                            <div class="col">
                                            <button type="button" class="btn btn-crear " data-bs-toggle="modal" data-bs-target="#modal_nuevo_empleado">Nuevo Empleado</button>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="row">
                                    <?php 
                                        $query="SELECT * FROM empleado WHERE cargo<".$_SESSION['cargo'].";";
                                        $empleados = $conn->query($query);
                                        if(mysqli_num_rows ( $empleados ) > 0){
                                            ?> <ul class="list-group mt-3"> <?php 
                                            while($empleado = $empleados->fetch_assoc()){
                                                ?>                                    
                                                <li class="list-group-item d-flex  <?php if($empleado['cargo'] == 2 ){ echo "list-group-item-info";}else{echo "list-group-item-light";}?>" >
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                                </svg>
                                                <?php echo $empleado['nombre']?>
                                                    </li>                                              
                                                <?php
                                            } 
                                            ?></ul><?php                                           
                                        } else {
                                            echo "Actualmente sin empleados";
                                        }
                                    ?>
                                </div>
                                <?php include("element/modal-empleado.php") ?>
                            </div>
                            
                        </div> 
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