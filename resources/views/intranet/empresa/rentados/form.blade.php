<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="proveedor_rentado_id" class="control-label requerido">Proveedor</label>
            <div class="input-group mb-3">
                <a class="btn btn-outline-info" type="button" id="button_modal_proveedores"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <select class="form-control" name="proveedor_rentado_id" id="proveedor_rentado_id">
                    <option value="">--Seleccione--</option>
                    @foreach ($proveedores as $proveedor)
                    <option value="{{$proveedor->id}}" {{isset($equipo)?($proveedor->id==$equipo->proveedor_rentado_id?'selected':''):''}}>{{$proveedor->proveedor}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="centro_costo_id" class="control-label requerido">Centro de Costo</label>
            <div class="input-group mb-3">
                <a class="btn btn-outline-info" type="button" id="button_modal_centros"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <select class="form-control" name="centro_costo_id" id="centro_costo_id" data_url="{{route('cargar_subcentro')}}">
                    <option value="">--Seleccione--</option>
                    @foreach ($centros_costos as $centros_costo)
                    <option value="{{$centros_costo->id}}" {{isset($equipo)?($centros_costo->id==$equipo->centro_costo_id?'selected':''):''}}>{{$centros_costo->proyecto}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="sub_centro_costo_id" class="control-label requerido">Sub-Centro de Costo</label>
            <div class="input-group mb-3">
                <a class="btn btn-outline-info" type="button" id="button_modal_sub_centros" data_id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <select class="form-control" name="sub_centro_costo_id" id="sub_centro_costo_id">
                    @if (isset($equipo))
                    @if ($equipo->centro_costo->sub_centros->count()>0 && $equipo->sub_centro_costo_id != null)
                    <option value="">--Seleccione--</option>
                    @foreach ($equipo->centro_costo->sub_centros as $sub_centro)
                    <option value="{{$sub_centro->id}}" {{$equipo->sub_centro_costo_id==$sub_centro->id?'selected':''}}>{{$sub_centro->centro}}</option>
                    @endforeach
                    @else
                    <option value="">--Seleccione un centro de costo --</option>
                    @endif
                    @else
                    <option value="">--Seleccione un centro de costo --</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="rentado_responsable_id" class="control-label">Responsable</label>
            <div class="input-group mb-3">
                <a class="btn btn-outline-info" type="button" id="button_modal_responsables"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <select class="form-control" name="rentado_responsable_id" id="rentado_responsable_id">
                    <option value="">--Seleccione--</option>
                    @foreach ($responsables as $responsable)
                    <option value="{{$responsable->id}}" {{isset($equipo)?($responsable->id==$equipo->rentado_responsable_id?'selected':''):''}}>{{$responsable->responsable}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="rentado_tipo_id" class="control-label requerido">Tipo de Equipo</label>
            <div class="input-group mb-3">
                <a class="btn btn-outline-info" type="button" id="button_modal_tipos"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <select class="form-control" name="rentado_tipo_id" id="rentado_tipo_id">
                    <option value="">--Seleccione--</option>
                    @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}" {{isset($equipo)?($tipo->id==$equipo->rentado_tipo_id?'selected':''):''}}>{{$tipo->tipo}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="serial" class="control-label requerido">Serial de Equipo</label>
            <input type="text" name="serial" id="serial" class="form-control" value="{{old('serial', $equipo->serial ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="codigo" class="control-label requerido">Código de Equipo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo', $equipo->codigo ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="ticket" class="control-label requerido">Ticket</label>
            <input type="text" name="ticket" id="ticket" class="form-control" value="{{old('ticket', $equipo->ticket ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="valor" class="control-label requerido">Valor sin IVA</label>
            <input type="number" min="0" name="valor" id="valor" class="form-control text-right pr-3" value="{{old('valor', $equipo->valor ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="fecha_entrega" class="control-label requerido">Fecha Entrega Proveedor</label>
            <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control pr-3" value="{{old('fecha_entrega', $equipo->fecha_entrega ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="fecha_entrega" class="control-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" rows="5" style="resize: none;">{{old('observaciones', $equipo->observaciones ?? '')}}</textarea>
        </div>
    </div>
</div>

