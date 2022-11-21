<!-- Modal EDITAR-->
<div class="modal fade modal-lg" id="<?php echo "editarModal".$numero ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">EDITAR CARACTERISTICA</h1>
      </div>
      <div class="modal-body aling-center mx-2">
        <div class="mx-auto">
            <div class="row border-bottom border-1 mb-3">
                <div class="col">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" value = "<?php echo $caracteristica['nombre'];?>" id="nombre_caracteristica" placeholder="nombre caracteristica" name="nombre_caracteristica"  form="">
                        <label for="nombre_caracteristica">Nombre de la característica</label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <select disabled name="tipo_input" id="tipo_input" class="form-select" aria-label="Default select example">
                                    <option>
                                            <?php echo $nombresInput[0] ?>
                                        </option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="formulario_selector">
                <form action="editar-selector.php?id=<?php echo $caracteristica['id'] ?>" method="post" id="selector_form<?php echo $caracteristica['id'] ?>" class="w-75 mx-auto">
                    <div class="row">
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="tipo_seleccion">Tipo de seleccion</label>
                                <select name="tipo_seleccion" id="tipo_seleccion" class="form-select" aria-label="Default select example">
                                    <?php
                                    $query = "SELECT * FROM selector as S WHERE S.id = ".$caracteristica['id'].";";
                                    $selectores = $conn->query($query);
    
                                    if($selectores->num_rows > 0){
                                        $selector = ($selectores->fetch_assoc());
                                        $codigo_selector=$selector['id'];
                                        $tipo_selector= $selector['tipo_selector'];

                                        for($x = 0; $x < count($nombresSelector); $x++) {
                                            if(($tipo_selector-1)==$x){

                                                echo "<option selected value='".($x+1)."'>
                                                    ".$nombresSelector[$x]."
                                                </option>";

                                            }else{
                                                echo "<option value='".($x+1)."'>
                                                    ".$nombresSelector[$x]."
                                                </option>";
                                            }                                            
                                        };
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="tipo_valor">Tipo de valor</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value='1'>
                                        Base + Costo
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row listado" id="listado_editar">
                            <?php 
                                $query = "SELECT * FROM opcion WHERE selectorid =".$caracteristica['id'].";";
                                $opciones = $conn->query($query);
                                if( $opcion = $opciones->fetch_assoc() ){ 
                                    ?>
                                    <div class='datos_opcion d-flex' id="div<?php echo $numeroSelect?>">
                                        <div class="mb-3 form-floating opcion">
                                            <input value="<?php echo $opcion["nombre"] ?>" type="text" name='descripciones<?php echo $caracteristica['id'] ?>[]' autocomplete='off' placeholder='Nombre del campo' class="form-control" id="nombre_campo<?php echo $caracteristica['id'] ?>">
                                            <label for="nombre_campo">Opcion</label>
                                        </div>
                                        <div class="mb-3 form-floating precio">
                                            <input value="<?php echo number_format($opcion["costo"],2) ?>" type="number" name='valores<?php echo $caracteristica['id'] ?>[]' autocomplete='off' placeholder='Nombre del campo' class="form-control" id="valor_campo<?php echo $caracteristica['id'] ?>" step="0.01" min="0">
                                            <label for="valor_campo">Costo</label>
                                        </div>
                                        <div class="borrar mb-3">
                                            <a class="btn btn-danger not-active" href="javascript:void(0)" onclick="borrarInput(div<?php echo $numeroSelect?>)">X</a>
                                        </div>
                                    </div>
                                    <?php
                                    $numeroSelect=$numeroSelect+1;
                                }
                                while( $opcion = $opciones->fetch_assoc() ){
                                    ?>
                                    <div class='datos_opcion d-flex' id="div<?php echo $numeroSelect?>">
                                        <div class="mb-3 form-floating opcion">
                                            <input value="<?php echo $opcion["nombre"] ?>" type="text" name='descripciones<?php echo $caracteristica['id'] ?>[]' autocomplete='off' placeholder='Nombre del campo' class="form-control" id="nombre_campo<?php echo $caracteristica['id'] ?>">
                                            <label for="nombre_campo">Opcion</label>
                                        </div>
                                        <div class="mb-3 form-floating precio">
                                            <input value="<?php echo number_format($opcion["costo"],2) ?>" type="number" name='valores<?php echo $caracteristica['id'] ?>[]' autocomplete='off' placeholder='Nombre del campo' class="form-control" id="valor_campo<?php echo $caracteristica['id'] ?>" step="0.01" min="0">
                                            <label for="valor_campo">Costo</label>
                                        </div>
                                        <div class="borrar mb-3">
                                            <a class="btn btn-danger" href="javascript:void(0)" onclick="borrarInput('div<?php echo $numeroSelect?>')">X</a>
                                        </div>
                                    </div>
                                    <?php
                                    $numeroSelect=$numeroSelect+1;
                                }
                            ?>

                            

                        
                    </div>
                    <button type="button" class="btn btn-primary mb-2" onclick="agregar('listado_editar','descripciones<?php echo $caracteristica['id'] ?>','valores<?php echo $caracteristica['id'] ?>')" id="new_op_nuevo">Agregar opción</button>
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="selector_form<?php echo $caracteristica['id'] ?>" >Guardar</button>
      </div>
    </div>
  </div>
</div>