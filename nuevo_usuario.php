<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Nuevo usuario</title>
      <!-- Favicon -->
      <?php include('./elementos/favicon.php'); ?>
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <!-- Mis estilos -->
      <link href="./style/formulario.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form_info m-auto">
      <form id="ingresar" action="./guardar_usuario.php" method="POST">
        <img class="mb-2" src="./img/logo.png" alt="" width="72" >
        <h1 class="h3 mb-3 fw-normal">Crear usuario</h1>

        <div id="alertSI" class="alert alert-success alert-dismissible fade show" role="alert">Login ¡OK!</div>
        <div id="alertNO" class="alert alert-danger" role="alert">Complete los datos</div>

        <div class="form-floating">
          <input type="text" class="form-control" id="nombre" name="nombre">
          <label for="email">Nombre</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating">
          <input type="number" class="form-control" id="edad" name="edad">
          <label for="email">Edad</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="pass" name="pass">
          <label for="pass">Contraseña</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="pass2" name="pass2">
          <label for="pass2">Contraseña</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Enviar</button>
      </form>

      <a href="./index.php" class="btn btn-secondary btn-lg mt-2 w-100">Iniciar sesión</a>
      <p class="mt-2 mb-3 text-muted">&copy; 2022</p>
    </main>
    
  </body>
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- Bootstrap json -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- Mis scripts -->
  <script src="js/dom.js"></script>
  <script src="js/nuevo_usuario.js"></script>
</html>