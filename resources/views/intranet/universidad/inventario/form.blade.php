<div class="row">
    <div class="col-12 col-md-6 form-group">
        <label for="usuario_id" class="requerido">Persona encargada del inventario</label>
        <select class="form-control form-control-sm" id="usuario_id" name="usuario_id">
            <option value="">---Seleccione---</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ isset($inventario) ? ($usuario->id == $inventario->usuario_id ? 'selected' : '') : '' }}>
                    {{ $usuario->persona->nombre1 . ' ' . $usuario->persona->nombre2 . ' ' . $usuario->persona->apellido1 . ' ' . $usuario->persona->apellido2  }}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    -
                    {{$usuario->roles[0]->nombre}}
                    -
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {{$usuario->roles[0]->id == 3 ? '( ' . $usuario->persona->cargo->area->area .' -> ' .$usuario->persona->cargo->cargo .' )' : '( ' . $usuario->persona->carrera->facultad->facultad .' -> ' .$usuario->persona->carrera->carrera .' )'}}
                </option>
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Inventario</small>
    </div>
    <input type="hidden" name="dependencia_id" value="{{isset($inventario) ? $inventario->dependencia_id:$dependencia->id}}">
    <div class="col-12 col-md-6 form-group">
        <label for="nom_inventario" class="requerido">Nombre o referencia del inventario</label>
        <input type="text" class="form-control form-control-sm" name="nom_inventario" id="nom_inventario"
            aria-describedby="helpId" value="{{ old('nom_inventario', $inventario->nom_inventario ?? '') }}"
            placeholder="Nombre de inventario" required>
        <small id="helpId" class="form-text text-muted">Nombre o referencia del inventario</small>
    </div>
</div>
