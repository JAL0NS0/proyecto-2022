<?php
        include('config/constantes.php');
        $id_producto= $_GET["id"];

        $query="SELECT * FROM Producto WHERE id=$id_producto";
        if(!$fila_producto = $conn->query($query)){
            header("Location: index.php");
        };
        if(!($fila_producto->num_rows > 0)){
            header("Location: index.php");
        }
        $datos_producto = $fila_producto->fetch_assoc();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $datos_producto['nombre']."-editar"?></title>
    <!-- Favicon -->
    <?php include('./elementos/favicon.php'); ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./style/header-1.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>
<body>
    <?php
        include('./elementos/header-1.php'); 
    ?>
    
    <main>
    <div class="site-section mt-4">
      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="./subidos/<?php echo $datos_producto['imagen']?>" alt="<?php echo $datos_producto['imagen']?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2 class="text-black"><?php echo $datos_producto['nombre']?></h2>
                </div>
                <div class="row">
                    <p><?php echo $datos_producto['descripcion']?></p>
                </div>
                <div class="row">
                    <p><strong class="text-primary h4">PRECIO BASE: Q <span id="base"> <?php echo $datos_producto['precio_base'] ?> </span> </strong></p>
                </div>

                <?php
                    $query = "SELECT * FROM tudi.caracteristica WHERE productoid=$id_producto;";
                    $caracteristicas = $conn->query($query);

                    $codigo_texto = 1;
                    while($caracteristica = $caracteristicas->fetch_assoc()){
                        $id_caracteristica=$caracteristica['id'];
                        $nombre_caracteristica = $caracteristica['nombre'];
                        ?>
                            <div class="row my-2">
                                <h4><?php echo $nombre_caracteristica?></h4>
                                <div class="ms-3">
                                <?php
                                    $query = "SELECT * FROM selector WHERE id='$id_caracteristica'";
                                    $fila_selector = $conn->query($query);
                                    if($fila_selector-> num_rows > 0){
                                        $selector = $fila_selector->fetch_assoc();
                                        $codigo_selector = $id_caracteristica;
                                        $tipo_selector = $selector['tipo_selector'];

                                        $query = "SELECT * FROM opcion WHERE selectorid=$codigo_selector";
                                        if($opciones = $conn->query($query)){
                                            $cuenta=0;
                                            while($opcion = $opciones->fetch_assoc()){
                                                $cuenta=$cuenta+1;
                                                if($tipo_selector == 1){
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="<?php echo $opcion['costo']?>" name="<?php echo $codigo_selector?>" id="<?php echo $codigo_selector."-".$cuenta?>">
                                                            <label class="form-check-label" for="<?php echo $codigo_selector."-".$cuenta?>">
                                                                <?php echo $opcion['nombre']."( + Q.".$opcion['costo']." )"?>
                                                            </label>
                                                        </div>
                                                    <?php
                                                }

                                                if($tipo_selector == 2){
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="<?php echo $opcion['costo']?>" name="<?php echo $codigo_selector?>" id="<?php echo $codigo_selector."-".$cuenta?>">
                                                            <label class="form-check-label" for="<?php echo $codigo_selector."-".$cuenta?>">
                                                                <?php echo $opcion['nombre']."( + Q.".$opcion['costo']." )"?>
                                                            </label>
                                                        </div>                                                    
                                                    <?php
                                                }
                                            }                                        
                                        }
                                    }

                                    $query = "SELECT * FROM tudi.texto WHERE id= $id_caracteristica";
                                    $fila_texto = $conn->query($query);
                                    if($fila_texto->num_rows > 0){
                                        $texto = ($fila_texto->fetch_assoc());
                                        $costo = $texto['costo'];
                                        $minimo = $texto['minimo'];
                                        $maximo = $texto['maximo'];
                                        $tipo_separacion = $texto['separacion'];
                                        ?>
                                            <span class="d-block">Costo <?php echo $separacionesTexto[$tipo_separacion-1]." Q.".$costo?></span>
                                            <input class="w-50" type="text" value="" id="<?php echo "t-".$codigo_texto?>" minlength="<?php echo $minimo?>" maxlength="<?php echo $maximo?>">
                                            <span class="d-block">Minimo <?php echo $minimo?> letras y maximo <?php echo $maximo?> letras</span>
                                        <?php
                                        $codigo_texto = $codigo_texto + 1;
                                    }
                                ?>
                                </div>
                            </div>
                        <?php
                    }


                ?>
                

                <div class="row">
                    <div class="mb-2">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary" id="js-btn-minus" type="button">−</button>
                            </div>
                            <input type="text" class="form-control text-center" id="num_productos" value="1" onchange="calcular()">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="js-btn-plus" type="button">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2">
                        <p><strong class="text-primary h4">PRESUPUESTO:
                             Q. <span id="presupuesto" class="block"><?php echo $datos_producto['precio_base'] ?></span>
                        </strong></p>
                    </div>
                </div>      
            </div>
          </div>
        </div>
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
<script>
    D.id('js-btn-plus').addEventListener("click",function() {
        D.id('num_productos').value = parseInt(D.id('num_productos').value)+1;
        calcular();
    });
    D.id('js-btn-minus').addEventListener("click",function() {
        if(D.id('num_productos').value > 1){
            D.id('num_productos').value = parseInt(D.id('num_productos').value)-1;
            calcular();
        }
    });

    <?php 

        $funcion= "";
        $query = "SELECT * FROM tudi.caracteristica WHERE productoid=$id_producto;";
        $caracteristicas = $conn->query($query);
        $numero = 1;
        $codigo_texto = 1;

        while($caracteristica = $caracteristicas->fetch_assoc()){
            $nombre_caracteristica=$caracteristica['nombre'];
            $id_caracteristica=$caracteristica['id'];
            $query = "SELECT * FROM selector WHERE id=$id_caracteristica";
            $fila_selector = $conn->query($query);                
            if($fila_selector->num_rows > 0){
                $selector = $fila_selector->fetch_assoc();
                $codigo_selector = $id_caracteristica;
                $tipo_selector = $selector['tipo_selector'];
                if($tipo_selector == 1){
                    echo "$('input[type=radio][name=\"$codigo_selector\"]').change(function() {
                        if($(this)){
                            calcular();
                        }        
                    });";

                    $funcion=$funcion."let suma$numero =0; if( document.querySelector('input[name=\"$codigo_selector\"]:checked') ){
                        suma$numero = parseFloat(document.querySelector('input[name=\"$codigo_selector\"]:checked').value);
                    }";
                    $numero= $numero+1;
                }
                if($tipo_selector == 2){
                    $query = "SELECT * FROM opcion WHERE selectorid=$codigo_selector";
                    if($opciones = $conn->query($query)){
                        $cuenta=0;
                        while($opcion = $opciones->fetch_assoc()){
                            $cuenta=$cuenta+1;
                            echo "D.id('$codigo_selector-$cuenta').addEventListener(\"change\",function() {
                                calcular();
                            });";
                        }
                    }
                    $funcion=$funcion."let suma$numero = 0;
                            let checkboxes= document.querySelectorAll('input[name=\"$codigo_selector\"]:checked');
                            checkboxes.forEach((checkbox) => {
                                suma$numero = suma$numero + parseFloat(checkbox.value);
                            });";
                            $numero= $numero+1;                                       
                }
            }

            $query = "SELECT * FROM tudi.texto WHERE id=$id_caracteristica";
            $fila_texto = $conn->query($query);
            if($fila_texto->num_rows > 0){
                $texto = ($fila_texto->fetch_assoc());
                $costo = $texto['costo'];
                $minimo = $texto['minimo'];
                $maximo = $texto['maximo'];
                $tipo_separacion = $texto['separacion'];

                echo "D.id('t-$codigo_texto').addEventListener('change', calcular);";
                $funcion=$funcion."let suma$numero=0;";
                if($tipo_separacion==1){
                    $funcion=$funcion."suma$numero = ((D.id('t-$codigo_texto').value).replace(/\s+/g, '')).length * $costo;";
                }else if($tipo_separacion ==2){
                    $funcion=$funcion."if(!(D.id('t-$codigo_texto').value.length == 0)){suma$numero = (D.id('t-$codigo_texto').value).split(' ').length * $costo};";
                }else{
                    $funcion=$funcion."if(!(D.id('t-$codigo_texto').value.length == 0)){suma$numero = parseFloat($costo)};";
                }

                

                $codigo_texto = $codigo_texto + 1;
                $numero=$numero+1;


            }
        }
    ?>

    function calcular(){
        const calculo = D.id('base');
        let base = parseFloat(calculo.innerHTML);
        let num_productos = D.id('num_productos').value;
        <?php echo $funcion ?>
        D.id('presupuesto').innerHTML = ((base <?php $i=1;while( $i< $numero){ echo "+suma$i";$i++;} ?> )*num_productos).toFixed(2);
    }
</script>

</html>