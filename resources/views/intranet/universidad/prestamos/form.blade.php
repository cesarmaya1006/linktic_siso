<input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
<div class="row">
    <div class="col-12">
        <h6>Tipo de usuario que solicita el prestamo</h6>
    </div>
    <div class="col-12">
        @foreach ($roles as $rol)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipousuario" id="rol_{{ $rol->id }}"
                    value="{{ $rol->id }}" {{ $rol->id == 6 ? 'checked' : '' }} data_url1="{{route('cargar_areas')}}" data_url2="{{route('cargar_facultades')}}">
                <label class="form-check-label" for="rol_{{ $rol->id }}">{{ $rol->nombre }}</label>
            </div>
        @endforeach
    </div>
</div>
<div class="row cajaFacultades">
    <div class="col-12 col-md-3">
        <label for="facultad_id" id="facultad_label">Facultad</label>
        <select class="form-control form-control-sm" id="facultad_id" data_url1="{{route('cargar_cargos')}}" data_url2="{{route('cargar_carreras')}}">
            <option value="">---Seleccione---</option>
            @foreach ($facultades as $facultad)
                <option value="{{ $facultad->id }}">{{ $facultad->facultad }}</option>
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Facultad</small>
    </div>
    <div class="col-12 col-md-3">
        <label for="carrera_id" id="carrera_label">Carrera</label>
        <select class="form-control form-control-sm" id="carrera_id" data_url1="{{route('cargar_usuarios_cargos')}}" data_url2="{{route('cargar_usuarios_carreras')}}">
            <option value="">---Seleccione una facultad---</option>
        </select>
        <small id="helpId" class="form-text text-muted">Carrera</small>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="persona_id" class="requerido">Usuario Solicitante</label>
            <select class="form-control form-control-sm" id="persona_id" name="persona_id" required>
                <option value="">---Seleccione una carrera---</option>
            </select>
            <small id="helpId" class="form-text text-muted">Quien solicita el articulo o elemento</small>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-md-4">
        <label for="producto_id" id="facultad_label">Producto / Elemento</label>
        <select class="form-control form-control-sm" id="producto_id" name="producto_id" data_url="{{route('cargar_max_prod')}}" required>
            <option value="">---Seleccione---</option>
            @foreach ($inventario->productos as $producto)
            @if ($producto->stock>0 )
            <option value="{{ $producto->id }}">
                {{ $producto->elemento}}
            </option>
            @endif
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Producto o elemento solicitado</small>
    </div>
    <div class="col-12 col-md-2 form-group">
        <label for="cantidad" class="requerido">Cantidad</label>
        <input type="number" class="form-control form-control-sm text-right" name="cantidad" id="cantidad" aria-describedby="helpId" value="1" min="1" required>
        <small id="helpId" class="form-text text-muted">Cantidad</small>
    </div>
    <div class="col-12 col-md-2 form-group">
        <label for="fec_prestamo" class="requerido">Fecha de Prestamo</label>
        <span class="form-control form-control-sm text-center">{{date('Y-m-d')}}</span>
        <input type="hidden" name="fec_prestamo" value="{{date('Y-m-d')}}" required>
        <small id="helpId" class="form-text text-muted">Fecha prestamo</small>
    </div>
    <div class="col-12 col-md-2 form-group">
        <label for="hor_prestamo" class="requerido">Hora de Prestamo</label>
        <span class="form-control form-control-sm text-center">{{date('H:i:s')}}</span>
        <input type="hidden" name="hor_prestamo" value="{{date('H:i:s')}}" required>
        <small id="helpId" class="form-text text-muted">Hora prestamo</small>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <h6>Tiempo de Entrega</h6>
    </div>
    <div class="col-12 col-md-2">
        <label for="fec_vencimiento" class="requerido">Fecha de Prestamo</label>
        <input class="form-control form-control-sm" type="date" name="fec_vencimiento" id="fec_vencimiento" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" required>
        <small id="helpId" class="form-text text-muted">Fecha prestamo</small>
    </div>
    <div class="col-12 col-md-2">
        <label for="hor_vencimiento" class="requerido">Fecha de Prestamo</label>
        <input class="form-control form-control-sm" type="time" name="hor_vencimiento" id="hor_vencimiento" value="{{date('15:00:00')}}" required>
        <small id="helpId" class="form-text text-muted">Fecha prestamo</small>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <textarea class="form-control form-control-sm" name="observaciones" id="observaciones" rows="6" cols="40">Observaciones</textarea>
    </div>
</div>
