<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="cuenta" class="control-label requerido"> Nombre del Dominio </label>
            <input type="text" name="cuenta" id="cuenta" class="form-control form-control-sm" value="{{old('cuenta', $pagos->cuenta ?? '')}}" required />
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="apellido" class="control-label requerido"> Estado </label>
            <select class="form-control form-control-sm" name="estado" id="estado">
                <option value=""> --Seleccione-- </option>
                <option value="activo" {{isset($pagos)?($pagos->estado=='activo'?'selected':''):''}}>Activo</option>
                <option value="inactivo" {{isset($pagos)?($pagos->estado=='inactivo'?'selected':''):''}}>Inactivo</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="ticket" class="control-label">Ticket renovacion</label>
            <input type="text" name="ticket_renovacion" id="ticket_renovacion" class="form-control form-control-sm" 
            value="{{old('ticket', $pagos->ticket ?? '')}}" />
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="estado" class="control-label"> Renovacion </label>
            <select class="form-control form-control-sm" name="renovacion" id="renovacion">
                <option value=""> --Seleccione-- </option>
                <option value="SI" {{isset($pagos)?($pagos->estado=='SI'?'selected':''):''}}>SI</option>
                <option value="No" {{isset($pagos)?($pagos->estado=='NO'?'selected':''):''}}>NO</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="fecha_de_vencimiento" class="control-label"> Fecha de vencimiento </label>
            <input type="date" name="fecha_de_vencimiento" id="fecha_de_vencimiento"
             class="form-control form-control-sm" value="{{old('fecha_de_vencimiento', $pagos->fecha_de_vencimiento??'')}}" />

        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="centro_costos_id" class="control-label requerido">Centro de Costo</label>
            <select class="form-control form-control-sm" name="centro_costos_id" id="centro_costos_id">
                <option value="">--Seleccione--</option>
                @foreach ($centros as $centro)
                <option value="{{$centro->id}}" {{isset($pagos)?($centro->id==$pagos->centro_costos_id?'selected':''):''}}>{{$centro->proyecto}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="centro_costos_id" class="control-label requerido"> Empleado </label>
            <select class="form-control form-control-sm" name="empleado_id" id="empleado_id">
                <option value="">--Seleccione--</option>
                @foreach ($empleados as $empleado)
                <option value="{{$empleado->id}}" {{isset($pagos)?($empleado->id==$pagos->usuario->id?'selected':''):''}}>{{$empleado->usuario}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="factura" class="control-label"> Factura </label>
            <input type="text" name="factura" id="factura" class="form-control form-control-sm" 
            value="{{old('factura', $pagos->factura??'')}}"/>

        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="valor" class="control-label"> Valor </label>
            <input type="numeric" name="valor" id="valor" class="form-control form-control-sm"
             value="{{old('valor', $pagos->valor??'')}}" />

        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="costo_dolares" class="control-label"> Tarjeta </label>
            <input type="text" name="tarjeta" id="tarjeta" class="form-control form-control-sm" 
            value="{{old('tarjeta', $pagos->tarjeta??'')}}" />
        </div>
    </div>
</div>