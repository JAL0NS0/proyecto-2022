<div class="modal fade modal-lg" id="modal_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalLabel">Crear Categoria</h1>
      </div>
      <div class="modal-body aling-center">
        <div class="w-75 mx-auto">
            <form action="guardar_categoria.php" method="post" id="nuevo-form">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 form-floating">
                            <input required type="text" class="form-control" id="nombre_categoria" placeholder="nombre categoria" name="nombre_categoria">
                            <label for="nombre_categoria">Nombre de la Categoria</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="nuevo-form">Guardar</button>
      </div>
    </div>
  </div>
</div>