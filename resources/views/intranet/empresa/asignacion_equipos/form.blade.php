<div class="row d-flex  justify-content-between ">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label class="requerido" for="nombre">Nombres y Apellidos</label>
            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre" aria-describedby="helpId"
                value="{{ old('nombre', $asignacion->nombre ?? '') }}" placeholder="Nombres y apellidos" required>
            <small id="helpId" class="form-text text-muted">Nombres Y Apellidos</small>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label class="requerido" for="cargo">Cargo</label>
            <input type="text" class="form-control form-control-sm" name="cargo" id="cargo" aria-describedby="helpId"
                value="{{ old('cargo', $asignacion->cargo ?? '') }}" placeholder="Cargo" required>
            <small id="helpId" class="form-text text-muted">Cargo</small>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label class="requerido" for="jefe_directo">Jefe Directo</label>
            <input type="text" class="form-control form-control-sm" name="jefe_directo" id="jefe_directo" aria-describedby="helpId"
                value="{{ old('jefe_directo', $asignacion->jefe_directo ?? '') }}" placeholder="Jefe Directo" required>
            <small id="helpId" class="form-text text-muted">Jefe Directo</small>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="centro_costo_id" class="control-label requerido">Centro de Costo</label>
            <select class="form-control form-control-sm" name="centro_costo_id" id="centro_costo_id" required>
                <option value="">--Seleccione--</option>
                @foreach ($centros as $centro)
                <option value="{{$centro->id}}" {{isset($asignacion)?($centro->id==$asignacion->centro_costo_id?'selected':''):''}}>{{$centro->proyecto}}</option>
                @endforeach
            </select>
            <small id="helpId" class="form-text text-muted">Centro de Costo</small>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label class="requerido" for="tikect">Ticket de contratación</label>
            <input type="text" class="form-control form-control-sm" name="tikect" id="tikect" aria-describedby="helpId"
                value="{{ old('tikect', $asignacion->tikect ?? '') }}" placeholder="Ticket de contratación" required>
            <small id="helpId" class="form-text text-muted">Ticket de contratación</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="fecha_solicitud" class="control-label requerido">Fecha de solicitud</label>
            <input type="date" name="fecha_solicitud" id="fecha_solicitud" class="form-control form-control-sm pr-3" value="{{old('fecha_solicitud', $asignacion->fecha_solicitud ?? '')}}" required/>
            <small id="helpId" class="form-text text-muted">Fecha de solicitud</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="fecha_ingreso" class="control-label requerido">Fecha de ingreso</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control form-control-sm pr-3" value="{{old('fecha_ingreso', $asignacion->fecha_ingreso ?? '')}}" required/>
            <small id="helpId" class="form-text text-muted">Fecha de ingreso</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="estado" class="control-label requerido">Estado</label>
            <select class="form-control form-control-sm" name="estado" id="estado" required>
                <option value="">--Seleccione--</option>
                <option value="Pendiente" {{isset($asignacion)?($asignacion->estado=="Pendiente"?'selected':''):''}}>Pendiente</option>
                <option value="Listo para entregar" {{isset($asignacion)?($asignacion->estado=="Listo para entregar"?'selected':''):''}}>Listo para entregar</option>
                <option value="En proceso" {{isset($asignacion)?($asignacion->estado=="En proceso"?'selected':''):''}}>En proceso</option>
                <option value="Enviar" {{isset($asignacion)?($asignacion->estado=="Enviar"?'selected':''):''}}>Enviar</option>
                <option value="Enviado" {{isset($asignacion)?($asignacion->estado=="Enviado"?'selected':''):''}}>Enviado</option>
            </select>
            <small id="helpId" class="form-text text-muted">Estado</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="tikect_renta">Ticket de renta</label>
            <input type="text" class="form-control form-control-sm" name="tikect_renta" id="tikect_renta" aria-describedby="helpId"
                value="{{ old('tikect_renta', $asignacion->tikect_renta ?? '') }}" placeholder="Ticket de renta">
            <small id="helpId" class="form-text text-muted">Ticket de renta</small>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="comentarios" class="control-label">Comentarios</label>
            <textarea class="form-control" id="comentarios" name="comentarios" rows="3" style="resize: none;">{{old('comentarios', $asignacion->comentarios ?? '')}}</textarea>
            <small id="helpId" class="form-text text-muted">Comentarios</small>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="equipo" class="control-label requerido">Equipo por asignar</label>
            <select class="form-control form-control-sm" name="equipo" id="equipo" required>
                <option value="">--Seleccione--</option>
                <option value="Windows" {{isset($asignacion)?($asignacion->equipo=="Windows"?'selected':''):''}}>Windows</option>
                <option value="Rentado" {{isset($asignacion)?($asignacion->equipo=="Rentado"?'selected':''):''}}>Rentado</option>
                <option value="Mac" {{isset($asignacion)?($asignacion->equipo=="Mac"?'selected':''):''}}>Mac</option>
            </select>
            <small id="helpId" class="form-text text-muted">Equipo por asignar</small>
        </div>
    </div>
    <div class="col-12 col-md-10 d-none" id="caja_comentario">
        <div class="form-group">
            <label for="comentarios_equipo" class="control-label requerido">Observaciones Equipo</label>
            <textarea class="form-control" id="comentarios_equipo" name="comentarios_equipo" rows="2" style="resize: none;">{{old('comentarios_equipo', $asignacion->comentarios_equipo ?? '')}}</textarea>
            <small id="helpId" class="form-text text-muted">Observaciones Equipo</small>
        </div>
    </div>
</div>
