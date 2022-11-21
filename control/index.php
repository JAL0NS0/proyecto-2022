<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Login</title>
    <!-- Favicon -->
    <?php include('element/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Mis estilos -->
    <link href="./style/formulario.css" rel="stylesheet">
  </head>
  <body class="text-center"> 
    <main class="form_info m-auto">
      <form id="login" action="validar-login.php" method="POST">
        <img class="mb-2" src="./img/logo.png" alt="" width="72" >
        <h1 class="h3 mb-3 fw-normal" id="titulos">Inicio de sesión</h1>

        <div id="alertSI" class="alert alert-success alert-dismissible fade show" role="alert">Login ¡OK!</div>
        <div id="alertNO" class="alert alert-danger" role="alert">Complete los datos</div>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          <label for="email">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
          <label for="pass">Contraseña</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Ingresar</button>
      </form>
      <p class="mt-2 mb-3 text-muted">&copy; 2022</p>
    </main>
  </body>

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- Bootstrap json -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- Mis scripts -->
  <script src="js/dom.js"></script>
  <script src="js/validar_login.js"></script>
</html>
