<?php
    $query = "SELECT * FROM caracteristica WHERE productoid=$id";

    $caracteristicas = $conn->query($query);
    $numero=1;
    $numeroSelect = 999;
    $numeroListado = 666;

    if($caracteristicas->num_rows > 0){

        while( $caracteristica = $caracteristicas->fetch_assoc() ){
            $nombreCaracteristica = $caracteristica['nombre'];
            ?> 
                
                <div class="caracteristica mb-2">
                    <div class="row d-flex p-2 justify-content-between">
                        <div class="titulo-caracteristica"><h5><?php echo $nombreCaracteristica?></h5></div>
                        <div class="botones-caracteristica d-flex">
                            <div class="mx-1">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="<?php echo "#eliminarModal".$numero ?>">
                                    Eliminar
                                </button>
                            </div>
                            <div class="mx-1">
                                <button type="button" class="btn btn-crear" data-bs-toggle="modal" data-bs-target="<?php echo "#editarModal".$numero ?>">
                                    Editar
                                </button>
                            </div>
                            <div class="mx-1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo "#opciones".$numero ?>" aria-expanded="false" aria-controls="<?php echo "opciones".$numero ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="collapse" id="<?php echo "opciones".$numero ?>">
                        <div class="p-3">

                            <?php 
                                $tiene_opciones = false;
                                $select = false;
                                $query = "SELECT * FROM selector as S WHERE S.id = ".$caracteristica['id'].";";
                                $selectores = $conn->query($query);

                                if($selectores->num_rows > 0){
                                    ?><div class="d-flex"><?php
                                    $tiene_opciones=true;
                                    $select=true;
                                    $selector = ($selectores->fetch_assoc());
                                    $codigo_selector=$selector['id'];
                                    $tipo_selector= $selector['tipo_selector'];
                                    ?>

                                        <div class="col-8 lista-opciones">
                                            <div class="my-3 mx-auto">
                                                <?php
                                                        $query= "SELECT * FROM tudi.opcion WHERE selectorid=".$caracteristica['id'].";";
                                                        $opciones = $conn->query($query);
                                                        while( $opcion = $opciones->fetch_assoc() ){
                                                            ?>
                                                            <ul class="list-group list-group-horizontal w-75">
                                                                <li class="list-group-item list-group-item-secondary w-75"><?php echo $opcion["nombre"] ?></li>
                                                                <li class="list-group-item list-group-item-secondary w-25 text-end">Q.<?php echo number_format($opcion["costo"],2) ?> </li>
                                                            </ul>
                                                            <?php
                                                        }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="col-4 tipo">
                                            <div class="col"> Tipo:<?php echo $nombresSelector[ $tipo_selector-1 ] ?></div>
                                            <div class="col">Valor agregado: Base + costo</div>
                                        </div>
                                    </div>
                            <?php }
                
                            $query = "SELECT * FROM tudi.texto as T WHERE T.id = ".$caracteristica['id'].";";
                            $fila_texto = $conn->query($query);

                            if($fila_texto->num_rows > 0){
                                $tiene_opciones=true;
                                $texto = ($fila_texto->fetch_assoc());
                                $costo = $texto['costo'];
                                $minimo = $texto['minimo'];
                                $maximo = $texto['maximo'];
                                $tipo_separacion = $texto['separacion'];
                                
                                ?>
                                <div>
                                    <div class="row mx-auto">
                                        <div class="col">
                                            <label for="">Minimo de letras</label>
                                            <input class="form-control" type="text" value="<?php echo $minimo ?>" aria-label="Disabled input" disabled readonly>
                                        </div>
                                        <div class="col">
                                            <label for="">Maximo de letras</label>
                                            <input class="form-control" type="text" value="<?php echo $maximo ?>" aria-label="Disabled input" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="row mx-auto">
                                        <div class="col">
                                            <label for="">Tipo de cobro</label>
                                            <input class="form-control" type="text" value="<?php echo $separacionesTexto[$tipo_separacion-1] ?>" aria-label="Disabled input" disabled readonly>
                                        </div>
                                        <div class="col">
                                            <label for="">Costo</label>
                                            <input class="form-control" type="text" value="Q.<?php echo number_format($costo,2) ?>" aria-label="Disabled input" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                            }
                            
                            if(!$tiene_opciones){
                                echo "SIN OPCIONES";
                            }
                            ?>
                        </div>
                    </div>

                    <?php 
                        if($select==true){
                            include('./element/modal-editar-select.php'); 
                        }else{
                            include('./element/modal-editar-texto.php');
                        }

                         
                    
                    ?>

                    <!-- Modal Eliminar-->
                    <div class="modal fade modal-lg" id="<?php echo "eliminarModal".$numero ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva característica</h1>
                            </div>
                            <div class="modal-body aling-center">
                                <div class="w-75 mx-auto">
                                    ¿Seguro que desea eliminar la caracteristica  "<?php echo $caracteristica['nombre'] ?>"?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <a href=<?php echo '" eliminar_caracteristica.php?id='.$caracteristica['id'].' "'?>  class="btn btn-primary">Eliminar</a>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            $numero= $numero+1;
        }
        

    }else{
        echo "Este producto no cuenta con caracteristicas";
    }
?>