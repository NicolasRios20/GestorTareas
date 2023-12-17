<div class="modal fade" id="modalProgress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario De Progreso Tareas</h5>
                <button type="button" data-bs-dismiss="modal"><i class="fas fa-times-circle" style="color: #ff0000; font-size: 25px"></i></button>
            </div>
            <div class="modal-body">
                <form id="formAddPercentage">
                    <input type="hidden" id="idTaskProgress" name="idTask">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Escriba un cometario:</label>
                        <textarea class="form-control" id="commentPercentage" name="comment" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ingrese un porcentaje:</label>
                        <input class="form-control form-control-sm" type="number" id="addPercentage" name="percentage" placeholder="5" aria-label=".form-control-sm example">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="addPercentage()"><i class="fas fa-plus"></i> Agregar Porcentaje</button>
            </div>
        </div>
    </div>
</div>
