<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/desplegar_style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include('config/constantes.php');
    ?>
    <form action="guardar_campo.php" method="post">
        <div>
            <label for="nombre_campo">Nombre del campo</label>
            <input type="text" id="nombre_campo" name="Nombre_campo">
        </div>
        <div>
            <label for="type_input">Tipo de selección</label>
            <select name="type_input" id="type_input">
                <?php 
                    $sql = "SELECT `nombre`,`type` FROM `prototipo`.`tipo_input`;";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['type']."'>".$row['nombre']."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div id="Listado">
            <div class='datos_opcion'>
                <div class='Nombre-Op'>
                    <label for="">Opcion</label>
                    <input type="text" name='valores[]' autocomplete='off' placeholder='Nombre del campo'>
                </div>
                <div class='Valor-Op'>
                    <label for="">Precio</label>
                    <input type="number" name='costos[]' autocomplete='off' placeholder='Nombre del campo'>
                </div>
            </div>
        </div>
        <input type="button" id="new_op" value="Agregar opción">
        <br>
        <input type="submit" value="guardar">
    </form>
    <script src="js/dom.js"></script>
    <script src="js/agregar_campos.js"></script>
</body>
</html>