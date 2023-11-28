<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"><img src="{{ asset('img/profile.png')}}" alt="" style="width: 30px"> Editar Usuario</h5>
          <button type="button" data-bs-dismiss="modal" aria-label="Close"><img src="{{ asset('img/x.png')}}" alt="" style="width: 30px"></button>
        </div>
        <div class="modal-body">
            <form id="editUserForm">
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="identification" class="form-label">Identificacion</label>
                        <input type="number" class="form-control form-control-sm" id="identification" name="identification" value="" readonly>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" value="" placeholder="Nicolas">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="email" class="form-label">Correo Electronico</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" value="" placeholder="name@example.com">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="rol" class="form-label">Rol Usuario</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="rol" name="rol">
                            <option value="Administrador">Administrador</option>
                            <option value="Estandar">Estandar</option>
                        </select>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="editUser()">Actualizar</button>
            </div>
      </div>
    </div>
</div>
