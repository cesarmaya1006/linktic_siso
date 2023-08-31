<div class="row d-flex  justify-content-between ">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label class="requerido" for="departamento">Departamento</label>
            <input type="text" class="form-control form-control-sm" name="departamento" id="departamento" aria-describedby="helpId"
                value="{{ old('departamento', $licencia->departamento ?? '') }}" placeholder="Departamento" required>
            <small id="helpId" class="form-text text-muted">Departamento</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="licencia_tipo" class="control-label requerido">Tipo de licencia</label>
            <select class="form-control form-control-sm" name="licencia_tipo" id="licencia_tipo" required>
                <option value="">--Seleccione--</option>
                <option value="Office 365" {{isset($licencia)?($licencia->licencia_tipo=="Office 365"?'selected':''):''}}>Office 365</option>
                <option value="Office familia" {{isset($licencia)?($licencia->licencia_tipo=="Office familia"?'selected':''):''}}>Office familia</option>
                <option value="Adobe" {{isset($licencia)?($licencia->licencia_tipo=="Adobe"?'selected':''):''}}>Adobe</option>
                <option value="Project plan 1" {{isset($licencia)?($licencia->licencia_tipo=="Project plan 1"?'selected':''):''}}>Project plan 1</option>
                <option value="Project plan 2" {{isset($licencia)?($licencia->licencia_tipo=="Project plan 2"?'selected':''):''}}>Project plan 2</option>
                <option value="Project plan 3" {{isset($licencia)?($licencia->licencia_tipo=="Project plan 3"?'selected':''):''}}>Project plan 3</option>
                <option value="Articulate" {{isset($licencia)?($licencia->licencia_tipo=="Articulate"?'selected':''):''}}>Articulate</option>
                <option value="Visual studio" {{isset($licencia)?($licencia->licencia_tipo=="Visual studio"?'selected':''):''}}>Visual studio</option>
                <option value="Platzi" {{isset($licencia)?($licencia->licencia_tipo=="Platzi"?'selected':''):''}}>Platzi</option>
                <option value="Flutter" {{isset($licencia)?($licencia->licencia_tipo=="Flutter"?'selected':''):''}}>Flutter</option>
                <option value="Metricool" {{isset($licencia)?($licencia->licencia_tipo=="Metricool"?'selected':''):''}}>Metricool</option>
                <option value="Envato" {{isset($licencia)?($licencia->licencia_tipo=="Envato"?'selected':''):''}}>Envato</option>
                <option value="Ahrefs" {{isset($licencia)?($licencia->licencia_tipo=="Ahrefs"?'selected':''):''}}>Ahrefs</option>
                <option value="Vercel" {{isset($licencia)?($licencia->licencia_tipo=="Vercel"?'selected':''):''}}>Vercel</option>
                <option value="Testgorilla" {{isset($licencia)?($licencia->licencia_tipo=="Testgorilla"?'selected':''):''}}>Testgorilla</option>
                <option value="Sppreaker" {{isset($licencia)?($licencia->licencia_tipo=="Sppreaker"?'selected':''):''}}>Sppreaker</option>
            </select>
            <small id="helpId" class="form-text text-muted">Tipo de licencia</small>
        </div>
    </div>
    <div class="col-12 col-md-1">
        <div class="form-group">
            <label class="requerido" for="cantidad">Cantidad</label>
            <input type="number" min="0" class="form-control form-control-sm" name="cantidad" id="cantidad" aria-describedby="helpId" value="{{ old('cantidad', $licencia->cantidad ?? '0') }}" required>
            <small id="helpId" class="form-text text-muted">Cantidad</small>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="empleados_id" class="control-label requerido">Asignado</label>
            <select class="form-control form-control-sm" name="empleados_id" id="empleados_id" required>
                <option value="">--Seleccione--</option>
                @foreach ($empleados as $empleado)
                <option value="{{$empleado->id}}" {{isset($licencia)?($empleado->id==$licencia->empleados_id?'selected':''):''}}>{{$empleado->usuario}}</option>
                @endforeach
            </select>
            <small id="helpId" class="form-text text-muted">Asignado</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="fecha_vencimietno" class="control-label requerido">Fecha de vencimiento</label>
            <input type="date" name="fecha_vencimietno" id="fecha_vencimietno" class="form-control form-control-sm pr-3" value="{{old('fecha_vencimietno', $licencia->fecha_vencimietno ?? '')}}" required/>
            <small id="helpId" class="form-text text-muted">Fecha de vencimiento</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="cuenta_acceso" class="requerido">Cuenta de acceso</label>
            <input type="text" class="form-control form-control-sm" name="cuenta_acceso" id="cuenta_acceso" aria-describedby="helpId"
                value="{{ old('cuenta_acceso', $licencia->cuenta_acceso ?? '') }}" placeholder="Cuenta de acceso" required>
            <small id="helpId" class="form-text text-muted">Cuenta de acceso</small>
        </div>
    </div>
</div>
