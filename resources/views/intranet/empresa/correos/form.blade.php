

<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="nombre" class="control-label requerido"> Nombre </label>
            <input type="text" name="nombre" id="nombre" class="form-control form-control-sm"
                   value="{{old('nombre', $correos->nombre ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="apellido" class="control-label requerido"> Apellido </label>
            <input type="text" name="apellido" id="apellido" class="form-control form-control-sm"
                   value="{{old('apellido', $correos->apellido ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="cedula" class="control-label requerido">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control form-control-sm"
                   value="{{old('correo', $correos->correo ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="dominio" class="control-label requerido"> Dominio </label>
            <select type="text" name="dominio" id="dominio" class="form-control form-control-sm" required>
                <option value="">--Seleccione--</option>

                @foreach ($dominios as $dominio)
                <option value="{{$dominio->id}}" {{isset($correos)?($correos->dominio==$dominio->id?'selected':''):''}}>{{$dominio->dominio}}</option>
                @endforeach </select>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="estado" class="control-label requerido">Estado</label>
            <select class="form-control form-control-sm" name="estado" id="estado" required>
                <option value="">--Seleccione--</option>
                <option value="Activo" {{!empty($correos)?($correos->estado=="Activo"?'selected':''):''}} >Activo</option>
                <option value="Eliminado" {{!empty($correos)?($correos->estado=="Eliminado"?'selected':''):''}}>Eliminado</option>

            </select>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="ticket" class="control-label requerido"> Ticket </label>
            <input type="text" name="ticket" id="ticket" class="form-control form-control-sm"
                   value="{{old('ticket', $correos->ticket??'')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="ticket" class="control-label requerido">Fecha de creacion</label>
            <input type="date" name="fecha_de_creacion" id="fecha_de_creacion"
             class="form-control form-control-sm" value="{{old('fecha_de_creacion', $correos->fecha_de_creacion ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="centro_costos_id" class="control-label requerido">Centro de Costo</label>
            <select class="form-control form-control-sm" name="centro_costos_id" id="centro_costos_id">
                <option value="">--Seleccione--</option>
                @foreach ($centros as $centro)
                <option value="{{$centro->id}}" {{isset($correos)?($centro->id==$correos->centro_costos_id?'selected':''):''}}>{{$centro->proyecto}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="costo_dolares" class="control-label requerido">Costos en dolares</label>
            <input type="text" name="costo_dolares" id="costo_dolares"
             class="form-control form-control-sm" value="{{old('costo_dolares', $correos->costo_dolares??'')}}" required/>

        </div>
    </div>
    @if (isset($correos))
        <div class="col-12 col-md-2 {{$correos->estado != 'Eliminado'?'d-none':''}}" id="campo_correos">
            <div class="form-group">
                <label for="ticket" class="control-label requerido"> Fecha de eliminacion </label>
                <input type="date" name="fecha_de_eliminacion" id="fecha_de_eliminacion"
                 class="form-control form-control-sm" value="{{ $correos->fecha_de_eliminacion!=NULL? $correos->fecha_de_eliminacion : date('Y-m-d')}}" required/>
            </div>
        </div>
    @endif
    <div class="form-group">
            <label for="comentarios" class="control-label"> Comentarios </label>
            <textarea name="comentarios" id="comentarios"
             class="form-control form-control-sm" value="{{old('comentarios', $correos->comentarios??'')}}">
             {{old('comentarios', $correos->comentarios??'')}}
            </textarea>

        </div>
</div>
