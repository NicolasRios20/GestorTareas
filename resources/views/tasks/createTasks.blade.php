<!-- Modal -->
<div class="modal fade" id="createTasks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createTasksLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createTasksLabel">Crear Tarea</h5>
          <button type="button" style="font-size: 20px" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times-circle"></i></button>
        </div>
        <div class="modal-body">
            <form id="createTasksForm">
                <div class="form-group m-2">
                    <label for="formGroupExampleInput">Tarea:</label>
                    <input class="form-control form-control-sm" id="name_task" name="name_task" type="text" placeholder="Titulo Tarea">
                </div>

                <div class="form-group m-2">
                    <label for="formGroupExampleInput">Descripcion Tarea:</label>
                    <textarea class="form-control" id="description" name="description" cols="3" rows="3" placeholder="Explicación corta de lo que se espera realizar o lograr"></textarea>
                </div>

                <div class="row m-2">
                    <div class="form-group col-6 ps-0">
                        <label for="formGroupExampleInput">Prioridad:</label>
                        <select class="form-select form-select-sm" id="priority" name="priority" aria-label="Default select example">
                            <option selected>Seleccione Prioridad</option>
                            <option value="Alta">Alta</option>
                            <option value="Normal">Frecuento o Normal</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                    <div class="form-group col-6 pe-0">
                        <label for="formGroupExampleInput">Fecha de vencimiento</label>
                        <input type="date" class="form-control form-control-sm" id="expiration_date" name="expiration_date">
                    </div>
                </div>

                <div class="form-group m-2">
                    <label for="formGroupExampleInput">Quien Desarrollara:</label>
                    <select class="form-select form-select-sm" id="user_assigned" name="user_assigned" aria-label="Default select example">


                    </select>
                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-sm btn-primary" onclick="createTasks()"><i class="fas fa-save"></i> Crear Tarea</button>
        </div>
      </div>
    </div>
</div>
