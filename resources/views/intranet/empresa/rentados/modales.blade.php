<!--  =============================================================================================   -->
<!--  Modal  Proveedores   -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="proveedoresModal" tabindex="-1" aria-labelledby="proveedoresModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="proveedoresModalLabel">Nuevo Proveedor Rentados</h5>
          <button type="button" class="btn-close cerrar_modal_responsables" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form
            action="{{route('equipos_rentados_guardar_centro')}}"
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_modal_proveedores">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    @include('intranet.parametros.proveedores.form_modal')
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-xs btn-sombra pl-4 pr-4 cerrar_modal_proveedores" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_proveedores">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
<!--  Modal  Centros de Costo   -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="centrosModal" tabindex="-1" aria-labelledby="centrosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="centrosModalLabel">Nuevo Centro de Costo</h5>
          <button type="button" class="btn-close cerrar_modal_responsables" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form
            action="{{route('equipos_rentados_guardar_centro')}}"
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_modal_centros">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    @include('intranet.parametros.centros.form_modal')
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-xs btn-sombra pl-4 pr-4 cerrar_modal_centros" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_centros">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
<!--  =============================================================================================   -->
<!--  Modal  Sub Centros de Costo   -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="sub_centrosModal" tabindex="-1" aria-labelledby="sub_centrosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sub_centrosModalLabel">Nuevo Sub-Centro de Costo</h5>
          <button type="button" class="btn-close cerrar_modal_responsables" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form
            action="{{route('equipos_rentados_guardar_sub_centro')}}"
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_modal_sub_centros">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    @include('intranet.parametros.sub_centros.form_modal')
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-xs btn-sombra pl-4 pr-4 cerrar_modal_sub_centros" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_sub_centros">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
<!--  Modal  Responsables   -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="responsablesModal" tabindex="-1" aria-labelledby="responsablesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="responsablesModalLabel">Nuevo Responsable</h5>
          <button type="button" class="btn-close cerrar_modal_responsables" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form
            action="{{route('equipos_rentados_guardar_responsable')}}"
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_modal_responsables">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    @include('intranet.parametros.responsables.form_modal')
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-xs btn-sombra pl-4 pr-4 cerrar_modal_responsables" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_responsables">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
<!--  Modal  Tipo Equipo   -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="tiposModal" tabindex="-1" aria-labelledby="tiposModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tiposModalLabel">Nuevo Tipo de Equipo</h5>
          <button type="button" class="btn-close cerrar_modal_tipos" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form
            action="{{route('equipos_rentados_guardar_tipo')}}"
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_modal_tipos">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    @include('intranet.parametros.tipos.form_modal')
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-xs btn-sombra pl-4 pr-4 cerrar_modal_tipos" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_tipos">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
<!--  Modal  Devolucion Equipo  a Proveedor -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="devolverProveedorModal" tabindex="-1" aria-labelledby="devolverProveedorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="devolverProveedorLabel">Nuevo Tipo de Equipo</h5>
          <button type="button" class="btn-close cerrar_modal_devolverProveedor" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form
            action=""
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_devolverProveedor">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="codigo" class="control-label requerido">Fecj</label>
                                <input type="hidden" name="fecha_devolucion" id="fecha_devolucion" value="{{date('Y-m-d')}}">
                                <span class="form-control form-control-sm">{{date('Y-m-d')}}</span>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-12"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-xs btn-sombra pl-4 pr-4 cerrar_modal_devolverProveedor" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_devolverProveedor">Devolver</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
<!--  Modal  Devolucion Equipo  a Bodega -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="devolverBodegaModal" tabindex="-1" aria-labelledby="devolverBodegaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="devolverBodegaLabel">Devolver equipo a bodega</h5>
        </div>
        <form
            action=""
            class="form-horizontal row"
            method="POST"
            autocomplete="off"
            id="form_devolverBodega">
            <div class="modal-body">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="codigo" class="control-label requerido">Fecha de devolución a bodega</label>
                                <input type="hidden" name="fecha_devolucion" id="fecha_devolucion" value="{{date('Y-m-d')}}">
                                <span class="form-control form-control-sm">{{date('Y-m-d')}}</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="fecha_entrega" class="control-label">Observaciones</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="5" style="resize: none;" required>N/A</textarea>
                            </div>
                        </div>
                        <div class="col-12"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4" id="submit_modal_devolverBodega">Devolver</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--  =============================================================================================   -->
