<div class="row">
    <div class="col-12 col-md-6 form-group">
        <label for="usuario_id" class="requerido">Persona encargada</label>
        <select class="form-control form-control-sm" id="usuario_id" name="usuario_id">
            <option value="">---Seleccione---</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ isset($dependencia) ? ($usuario->id == $dependencia->usuario_id ? 'selected' : '') : '' }}>
                    {{ $usuario->persona->nombre1 . ' ' . $usuario->persona->nombre2 . ' ' . $usuario->persona->apellido1 . ' ' . $usuario->persona->apellido2  }}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    -
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {{$usuario->roles[0]->id == 3 ? '( ' . $usuario->persona->cargo->area->area .' -> ' .$usuario->persona->cargo->cargo .' )' : '( ' . $usuario->persona->carrera->facultad->facultad .' -> ' .$usuario->persona->carrera->carrera .' )'}}
                </option>
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Facultad</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="dependencia" class="requerido">Nombre de dependencia</label>
        <input type="text" class="form-control form-control-sm" name="dependencia" id="dependencia"
            aria-describedby="helpId" value="{{ old('dependencia', $dependencia->dependencia ?? '') }}"
            placeholder="Nombre de dependencia" required>
        <small id="helpId" class="form-text text-muted">Nombre de dependencia</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control form-control-sm" name="telefono" id="telefono"
            aria-describedby="helpId" value="{{ old('telefono', $dependencia->telefono ?? '') }}"
            placeholder="Teléfono">
        <small id="helpId" class="form-text text-muted">Teléfono</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
            aria-describedby="helpId" value="{{ old('direccion', $dependencia->direccion ?? '') }}"
            placeholder="Dirección">
        <small id="helpId" class="form-text text-muted">Dirección</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control form-control-sm" name="email" id="email"
            aria-describedby="helpId" value="{{ old('email', $dependencia->email ?? '') }}"
            placeholder="Email">
        <small id="helpId" class="form-text text-muted">Email</small>
    </div>
</div>
