<div class="modal fade modal-lg" id="modal_nuevo_empleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalLabel">AGREGAR NUEVO EMPLEADO</h1>
      </div>
      <div class="modal-body aling-center">
        <div class="w-75 mx-auto">
            <form action="guardar_empleado.php" method="post" id="nuevo_empleado">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 form-floating">
                            <input required type="text" class="form-control" id="nombre" placeholder="nombre categoria" name="nombre">
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 form-floating">
                            <input required type="email" class="form-control" id="emial" placeholder="nombre categoria" name="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 form-floating">
                            <input required type="password" class="form-control" id="contrasena" placeholder="nombre categoria" name="contrasena">
                            <label for="nombre_categoria">Contraseña</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <select name="cargo" id="cargo" class="form-select" aria-label="Default select example">
                                    <option value="1">
                                        Empleado
                                    </option>
                                    <option value="2">
                                        Gerente
                                    </option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="nuevo_empleado">Guardar</button>
      </div>
    </div>
  </div>
</div>