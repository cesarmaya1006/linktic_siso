<!--  =============================================================================================   -->
<!--  Modal  Asignados   -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="asignadosModal" tabindex="-1" aria-labelledby="asignadosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="asignadosModalLabel">Nuevo Usuario / Entidad Asignación</h5>
          <button type="button" class="btn-close cerrar_modal_asignados" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form
            action="{{route('equipos_rentados_asignacion_guardar_asignado')}}"
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_modal_asignados_guardar">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="requerido" for="asignado">Usuario /Entidad</label>
                                <input type="text" class="form-control form-control-sm" name="asignado" id="asignado" aria-describedby="helpId"
                                       placeholder="Usuario /Entidad" required>
                                <small id="helpId" class="form-text text-muted">Usuario /Entidad asignación PC's Rentados</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-xs btn-sombra pl-4 pr-4 cerrar_modal_asignados" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_asignados">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
