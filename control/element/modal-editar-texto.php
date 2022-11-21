<!-- Modal TEXTO -->
<div class="modal fade modal-lg" id="<?php echo "editarModal".$numero ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva característica</h1>
      </div>
      <div class="modal-body aling-center mx-2">
        <div class="mx-auto">
            <div class="row border-bottom border-1 mb-3">
                <div class="col">
                    <div class="mb-3 form-floating">
                        <input required type="text" value="<?php echo $nombreCaracteristica ?>" class="form-control" id="nombre_caracteristica" placeholder="nombre caracteristica" name="nombre_caracteristica"  form="texto_form<?php echo $caracteristica['id'] ?>">
                        <label for="nombre_caracteristica">Nombre de la característica</label>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <select name="tipo_input" id="tipo_input" class="form-select" aria-label="Default select example" onchange="showForm()">
                            <option selected value="0">Tipo de selección</option>
                            <?php
                                for($x = 0; $x < count($nombresInput); $x++) {
                                    echo "<option value='".($x+1)."'>
                                            ".$nombresInput[$x]."
                                        </option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div id="formulario_texto">
                <form action="editar-texto.php?id=<?php echo $caracteristica['id'] ?>" method="post"  id="texto_form<?php echo $caracteristica['id'] ?>" class="w-75 mx-auto">
                    <div class="row">
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="long_min">Longitud minima</label>
                                <input value="<?php echo $minimo?>" type="number" name="long_min" id="long_min" class="form-control">
                            </div>
                        </div>
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="long_max">Longitud maxima</label>
                                <input value="<?php echo $maximo?>" type="number" name="long_max" id="long_max" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="tipo_costo">Tipo de cobro</label>
                                <select name="tipo_costo" id="tipo_costo" class="form-select" aria-label="Default select example">
                                    <option >Seleccione el tipo de cobro</option>
                                    <?php
                                        for($x = 0; $x < count($separacionesTexto); $x++){
                                            if(($tipo_separacion-1)==$x){
                                                echo "<option selected value='".($x+1)."'>".$separacionesTexto[$x]."</option>";
                                            }else{
                                                echo "<option value='".($x+1)."'>".$separacionesTexto[$x]."</option>";
                                            }                                            
                                        };
                                        
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="costo">Costo</label>
                                <input value="<?php echo $costo?>" type="number" name="costo" id="costo" step="0.01" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="texto_form<?php echo $caracteristica['id'] ?>" id="guardar">Guardar</button>
      </div>
    </div>
  </div>
</div>