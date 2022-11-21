<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <!-- Favicon -->
    <?php include('./elementos/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./style/header-1.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/login-empresa.css">
</head>
<body>
    <?php 
        include('config/constantes.php');
    ?>
    <?php
        include('./elementos/header-1.php');
    ?>

    <main>
        <div class="container pb-4">
            <div class="row login">
                <div class="col mx-auto mt-4 p-4 d-flex datos">
                        <div class="caja-trasera w-50 p-4">
                            <div class="info-login">
                                <h3>Administra tu empresa</h3>
                                <p>
                                    <ul>
                                        <li>Administra tus productos</li>
                                        <li>Actualiza caracteristicas de productos existentes</li>
                                        <li>Ingresa nuevos productos</li>
                                        <li>Recibe las solicitudes de usuarios interesados en tus productos</li>
                                    </ul>
                                </p>
                            </div>
                        </div>

                        <div class="caja-login w-50 px-4 pt-4 pb-2">
                            <form id="login" action="validar-empresa.php" method="POST">
                                <h1 class="h3 mb-3 fw-normal" id="titulos">Ingresar</h1>

                                <div id="alertSI-login" class="alert alert-success alert-dismissible fade show" role="alert">Login ¡OK!</div>
                                <div id="alertNO-login" class="alert alert-danger" role="alert">Complete los datos</div>

                                <div class="form-floating">
                                <input type="text" class="form-control" id="empresa" name="empresa">
                                <label for="empresa">Nombre de la empresa</label>
                                </div>

                                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Ingresar</button>
                            </form>
                        </div>                    
                </div>
            </div>
            <div class="row crear p-4 mt-3">
                    <h3>¿Aun no tienes empresa?</h3>
                    <p>¡Empieza a ofrecer tus propios productos creando una!</p>
                    <a href="./nueva-empresa.php" class="btn btn-crear btn-lg mt-2 w-100">Crear Empresa</a>
            </div>
        </div>
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
<script src="js/validar-empresa.js"></script>
</html>