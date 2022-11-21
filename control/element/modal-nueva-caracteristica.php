<!-- Modal -->
<div class="modal fade modal-lg" id="nuevoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input required type="text" class="form-control" id="nombre_caracteristica" placeholder="nombre caracteristica" name="nombre_caracteristica"  form="">
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
            <div id="formulario_selector" style="display: none" >
                <form action="guardar_caracteristica_selector.php" method="post" id="selector_form" class="w-75 mx-auto">
                    <div class="row">
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="tipo_seleccion">Tipo de seleccion</label>
                                <select name="tipo_seleccion" id="tipo_seleccion" class="form-select" aria-label="Default select example">
                                    <?php
                                        for($x = 0; $x < count($nombresSelector); $x++) {
                                            echo "<option value='".($x+1)."'>
                                                    ".$nombresSelector[$x]."
                                                </option>";
                                        };
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
                    <div class="row listado" id="listado_nuevo">
                        <div class='datos_opcion d-flex'>
                            <div class="mb-3 form-floating opcion">
                                <input required type="text" name='descripciones[]' autocomplete='off' placeholder='Nombre del campo' class="form-control" id="nombre_campo">
                                <label for="nombre_campo">Opcion</label>
                            </div>
                            <div class="mb-3 form-floating precio">
                                <input required type="number" name='valores[]' autocomplete='off' placeholder='Nombre del campo' class="form-control" id="valor_campo" step="0.01" min="0">
                                <label for="valor_campo">Costo</label>
                            </div>
                            <div class="borrar mb-3">
                                <a class="btn btn-danger not-active" href="javascript:void(0)">X</a>
                            </div>

                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mb-2" onclick="agregar('listado_nuevo','descripciones','valores')" id="new_op_nuevo">Agregar opción</button>
                </form>
            </div>
            <div id="formulario_texto" style="display: none">
                <form action="guardar_caracteristica_texto.php" method="post" id="texto_form" class="w-75 mx-auto">
                    <div class="row">
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="long_min">Longitud minima</label>
                                <input type="number" name="long_min" id="long_min" class="form-control">
                            </div>
                        </div>
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="long_max">Longitud maxima</label>
                                <input type="number" name="long_max" id="long_max" class="form-control">
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
                                            echo "<option value='".($x+1)."'>".$separacionesTexto[$x]."</option>";
                                        };
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col pb-2">
                            <div class="mb-3">
                                <label for="costo">Costo</label>
                                <input type="number" name="costo" id="costo" step="0.01" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="nuevo-form" id="guardar">Guardar</button>
      </div>
    </div>
  </div>
</div>