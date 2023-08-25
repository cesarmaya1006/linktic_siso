<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="empresas_id" class="control-label requerido">Empresa</label>
            <select class="form-control form-control-sm" name="empresas_id" id="empresas_id" required>
                <option value="">--Seleccione--</option>
                @foreach ($empresas as $empresa)
                <option value="{{$empresa->id}}" {{isset($empleado)?($empresa->id==$empleado->empresas_id?'selected':''):''}}>{{$empresa->empresa}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="cargo" class="control-label requerido">Cargo</label>
            <input type="text" name="cargo" id="cargo" class="form-control form-control-sm" value="{{old('cargo', $empleado->cargo ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="usuario" class="control-label requerido">Nombres y Apellidos</label>
            <input type="text" name="usuario" id="usuario" class="form-control form-control-sm" value="{{old('usuario', $empleado->usuario ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="cedula" class="control-label requerido">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control form-control-sm" value="{{old('cedula', $empleado->cedula ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="telefono" class="control-label requerido">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" value="{{old('telefono', $empleado->telefono ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="gestionas_id" class="control-label requerido">Gestión</label>
            <select class="form-control form-control-sm" name="gestionas_id" id="gestionas_id">
                <option value="">--Seleccione--</option>
                @foreach ($gestiones as $gestion)
                <option value="{{$gestion->id}}" {{isset($empleado)?($gestion->id==$empleado->gestionas_id?'selected':''):''}}>{{$gestion->gestion}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="contratos_id" class="control-label requerido">Tipo de Contrato</label>
            <select class="form-control form-control-sm" name="contratos_id" id="contratos_id">
                <option value="">--Seleccione--</option>
                @foreach ($contratos as $contrato)
                <option value="{{$contrato->id}}" {{isset($empleado)?($contrato->id==$empleado->contratos_id?'selected':''):''}}>{{$contrato->tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="ticket" class="control-label requerido">Ticket de Contratación</label>
            <input type="text" name="ticket" id="ticket" class="form-control form-control-sm" value="{{old('ticket', $empleado->ticket ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="centro_costos_id" class="control-label requerido">Centro de Costo</label>
            <select class="form-control form-control-sm" name="centro_costos_id[]" id="centro_costos_id" multiple="multiple">
                <option value="">--Seleccione--</option>
                @foreach ($centros as $centro)
                <option value="{{$centro->id}}" {{isset($empleado)?($centro->id==$empleado->centro_costos_id?'selected':''):''}}>{{$centro->proyecto}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if (isset($empleado))
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="estado" class="control-label requerido">Estado</label>
            <select class="form-control form-control-sm" name="estado" id="estado">
                <option value="Activo" {{$empleado->estado=='Activo'?'selected':''}}>Activo</option>
                <option value="Proceso de retiro" {{$empleado->estado=='Proceso de retiro'?'selected':''}}>Proceso de retiro</option>
                <option value="Retirados con cuentas activas" {{$empleado->estado=='Retirados con cuentas activas'?'selected':''}}>Retirados con cuentas activas</option>
            </select>
        </div>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-12 mt-4 mb-5">
        <button class="btn btn-primary btn-sobra btn-xs pl-5 pr-5 btn-sombra" type="submit">Guardar</button>
    </div>
</div>
