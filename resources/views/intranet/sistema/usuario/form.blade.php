<div class="row d-flex justify-content-evenly">
    <div class="col-10 col-md-2 form-group">
        <label for="rol_id" class="requerido">Rol de Usuario</label>
        <select name="rol_id[]" id="rol_id_form" class="form-control" required {{ isset($data) ? 'disabled' : '' }}>
            <option value="">Elija un Rol</option>
            @foreach ($roles as $id => $nombre)
                <option value="{{ $id }}"
                    {{ is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected' : '') : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                    {{ $nombre }}</option>
            @endforeach
        </select>
    </div>
    <!--  ------------------------------------------------------------------------------------  -->
    <div class="col-10 col-md-2 form-group cajasAreas">
        <label for="area_id" class="requerido">Área de trabajo</label>
        <select name="area_id" id="area_id" class="form-control"  data_url="{{route('cargar_cargos')}}">
            <option value="">Elija un Area</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}"
                    {{ is_array(old('area_id')) ? (in_array($id, old('area_id')) ? 'selected' : '') : (isset($data) ? ($data->area->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                    {{ $area->area }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-2 form-group cajasAreas">
        <label for="cargo_id" class="requerido">Cargo Laboral</label>
        <select name="cargo_id" id="cargo_id" class="form-control" >
            <option value="">Elija primero un Area</option>
            @if (isset($data))
            @foreach ($data->cargos as $cargo)
                <option value="{{ $cargo->id }}"
                    {{ is_array(old('cargo_id')) ? (in_array($id, old('cargo_id')) ? 'selected' : '') : (isset($data) ? ($data->cargo->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                    {{ $cargo->cargo }}</option>
            @endforeach
            @endif
        </select>
    </div>
    <!--  ------------------------------------------------------------------------------------  -->
    <div class="col-10 col-md-2 form-group cajasFacultades">
        <label for="facultad_id" class="requerido">Facultad</label>
        <select name="facultad_id" id="facultad_id" class="form-control"   data_url="{{route('cargar_carreras')}}">
            <option value="">Elija una facultad</option>
            @foreach ($facultades as $facultad)
                <option value="{{ $facultad->id }}"
                    {{ is_array(old('facultad_id')) ? (in_array($id, old('facultad_id')) ? 'selected' : '') : (isset($data) ? ($data->facultad->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                    {{ $facultad->facultad }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-2 form-group cajasFacultades">
        <label for="carrera_id" class="requerido">Carrera</label>
        <select name="carrera_id" id="carrera_id" class="form-control"  >
            <option value="">Elija primero una Facultad</option>
            @if (isset($data))
            @foreach ($data->carreras as $carrera)
                <option value="{{ $carrera->id }}"
                    {{ is_array(old('carrera_id')) ? (in_array($id, old('carrera_id')) ? 'selected' : '') : (isset($data) ? ($data->carrera->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                    {{ $carrera->carrera }}</option>
            @endforeach
            @endif
        </select>
    </div>
    <!--  ------------------------------------------------------------------------------------  -->
</div>
<div class="row d-flex justify-content-evenly">
    <div class="col-10 col-md-2 form-group">
        <label for="nombre1" class="requerido">Primer Nombre</label>
        <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Nombre de Usuario"
            value="{{ old('nombre1', $data->nombre1 ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Nombres</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="nombre2">Segundo Nombre</label>
        <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre de Usuario"
            value="{{ old('nombre2', $data->nombre2 ?? '') }}">
        <small id="helpId" class="form-text text-muted">Nombres</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="apellido1" class="requerido">Primer Apellido</label>
        <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Primer Apellido"
            value="{{ old('apellido1', $data->apellido1 ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Apellidos</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="apellido2">Segundo Apellido</label>
        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido"
            value="{{ old('apellido2', $data->apellido2 ?? '') }}">
        <small id="helpId" class="form-text text-muted">Apellidos</small>
    </div>
    <!--  ------------------------------------------------------------------------------------  -->
</div>
<div class="row d-flex justify-content-evenly">
    <div class="col-10 col-md-1 form-group">
        <label for="docutipos_id" class="requerido">Tipo Documento</label>
        <select name="docutipos_id" id="docutipos_id" class="form-control" required>
            <option value="">Tip Docum</option>
            @foreach ($tiposdocu as $tipo_docu)
                <option value="{{ $tipo_docu->id }}"
                    {{ is_array(old('docutipos_id')) ? (in_array($tipo_docu->id, old('docutipos_id')) ? 'selected' : '') : (isset($data) ? ($data->docutipos_id == $tipo_docu->id ? 'selected' : '') : '') }}>
                    {{ $tipo_docu->abreb_id }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="identificacion" class="requerido">N° de Identificaci&oacute;n</label>
        <input type="text" class="form-control" id="identificacion" name="identificacion"
            placeholder="N° de Identificación de  del Usuario"
            value="{{ old('identificacion', $data->identificacion ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">N° de Identificaci&oacute;n</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="email" class="requerido">Correo Electr&oacute;nico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email de  del Usuario"
            value="{{ old('email', isset($data) ? ($data->email != 'Sin Email' ? $data->email : '') : '') }}"
            required>
        <small id="helpId" class="form-text text-muted">Correo Electr&oacute;nico</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="telefono" class="requerido">Tel&eacute;fono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tel&eacute;fono Usuario"
            value="{{ old('telefono', isset($data) ? ($data->telefono != 'Sin Telefono' ? $data->telefono : '') : '') }}"
            required>
        <small id="helpId" class="form-text text-muted">Tel&eacute;fono</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="direccion" class="requerido">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion Usuario"
            value="{{ old('direccion', isset($data) ? ($data->direccion != 'Sin Direccion' ? $data->direccion : '') : '') }}"
            required>
        <small id="helpId" class="form-text text-muted">Dirección</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="vigencia" class="requerido">Vigencia</label>
        <div class="input-group date" data-provide="datepicker">
            <input type="date" class="form-control" name="vigencia" id="vigencia">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <small id="helpId" class="form-text text-muted">Fotografía</small>
    </div>
</div>
<div class="row d-flex justify-content-evenly">
    <div class="col-10 col-md-2 form-group">
        <label for="foto" class="requerido">Fotografía</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto del usuario"  accept="image/png,image/jpeg" onchange="mostrar()" required>
        <small id="helpId" class="form-text text-muted">Fotografía</small>
    </div>
    @if (!isset($data))
    <div class="col-10 col-md-2 form-group float-none">
        <label for="password" class="requerido">Contrase&ntilde;a</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <small id="helpId" class="form-text text-muted">Contrase&ntilde;a</small>
    </div>
    <div class="col-10 col-md-2 form-group float-left">
        <label for="re_password" class="requerido">Confirmaci&oacute;n Contrase&ntilde;a</label>
        <input type="password" class="form-control" id="re_password" name="re_password" required>
        <small id="helpId" class="form-text text-muted">Confirmaci&oacute;n Contrase&ntilde;a</small>
    </div>
    @endif
    <div class="col-12">
        <div class="row d-flex justify-content-evenly">
            <div class="col-10 col-md-2">
                <img class="img-fluid fotoUsuario" id="fotoUsuario" src="{{asset('/imagenes/usuarios/usuario-inicial.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>
