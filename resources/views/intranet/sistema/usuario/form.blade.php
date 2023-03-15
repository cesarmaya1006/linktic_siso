<div class="row d-flex justify-content-evenly">
    <div class="col-10 col-md-2 form-group">
        <label for="rol_id" class="requerido">Rol de Usuario</label>
        <select name="rol_id[]" id="rol_id_form" class="form-control" required {{ isset($data) ? 'disabled' : '' }}>
            <option value="">Elija un Rol</option>
            @foreach ($roles as $id => $nombre)
                <option value="{{ $id }}" {{ is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected' : '') : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '') }}>{{ $nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="contrato_id" class="requerido">Tipo de Contrato</label>
        <select name="contrato_id" id="contrato_id" class="form-control" required>
            <option value="">Elija un tipo de contrato</option>
            @foreach ($contratos as $contrato)
            <option value="{{ $contrato->id }}"
                {{ is_array(old('contrato_id')) ? (in_array($id, old('contrato_id')) ? 'selected' : '') : (isset($data) ? ($data->persona->contrato->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                {{ $contrato->tipo }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="centro_id" class="requerido">Centro de costo</label>
        <select name="centro_id" id="centro_id" class="form-control" required>
            <option value="">Elija un centro de costo</option>
            @foreach ($centros as $centro)
            <option value="{{ $centro->id }}"
                {{ is_array(old('centro_id')) ? (in_array($id, old('centro_id')) ? 'selected' : '') : (isset($data) ? ($data->persona->centro->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                {{ $centro->centro_costo }}</option>
            @endforeach
        </select>
    </div>
    <!--  ------------------------------------------------------------------------------------  -->
    <div class="col-10 col-md-2 form-group">
        <label for="area_id" class="requerido">Área de trabajo</label>
        <select name="area_id" id="area_id" class="form-control"  data_url="{{route('admin-cargar_cargos')}}">
            <option value="">Elija un Area</option>
            @foreach ($areas as $area)
            @if ($area->cargos->count() > 0)
            <option value="{{ $area->id }}"
                {{ is_array(old('area_id')) ? (in_array($id, old('area_id')) ? 'selected' : '') : (isset($data) ? ($data->area->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                {{ $area->area }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="cargo_id" class="requerido">Cargo Laboral</label>
        <select name="cargo_id" id="cargo_id" class="form-control" required>
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
</div>
<hr>
<div class="row d-flex justify-content-evenly">
    <div class="col-10 col-md-2 form-group">
        <label for="asignacion" class="requerido">Asignación Salarial</label>
        <input type="number" class="form-control text-right" id="asignacion" name="asignacion" step="500" placeholder="Nombre de Usuario"
            value="{{ old('asignacion', $data->asignacion ?? '0') }}" min="0"  required>
        <small id="helpId" class="form-text text-muted">Asignacion salarial</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="tiket">Num Tikect</label>
        <input type="text" class="form-control" id="tiket" name="tiket" placeholder="Nombre de Usuario"
            value="{{ old('tiket', $data->tiket ?? '') }}">
        <small id="helpId" class="form-text text-muted">Tikect</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="fecha_inicio" class="requerido">Fecha Inicio</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Nombre de Usuario"
            value="{{ old('fecha_inicio', $data->fecha_inicio ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">fecha inicio</small>
    </div>
    <div class="col-10 col-md-2 form-group">
        <label for="fecha_retiro">Fecha Retiro</label>
        <input type="date" class="form-control" id="fecha_retiro" name="fecha_retiro" placeholder="Nombre de Usuario"
            value="{{ old('fecha_retiro', $data->fecha_retiro ?? '') }}">
        <small id="helpId" class="form-text text-muted">fecha retiroo</small>
    </div>
    <!--  ------------------------------------------------------------------------------------  -->
</div>
<hr>
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
</div>
<div class="row d-flex justify-content-evenly">
    <div class="col-10 col-md-2 form-group">
        <label for="foto" class="requerido">Fotografía</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto del usuario"  accept="image/png,image/jpeg" onchange="mostrar()">
        <small id="helpId" class="form-text text-muted">Fotografía</small>
    </div>
    <div class="col-12">
        <div class="row d-flex justify-content-evenly">
            <div class="col-10 col-md-2">
                <img class="img-fluid fotoUsuario" id="fotoUsuario" src="{{asset('/imagenes/usuarios/usuario-inicial.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>
