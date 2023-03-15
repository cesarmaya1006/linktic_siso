<div class="col-12 col-md-6 form-group">
    <label for="area_id">Área</label>
    <select class="form-control form-control-sm" name="area_id" id="area_id">
        <option value="">---Seleccione---</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}"
                {{ isset($cargo) ? ($area->id == $cargo->area_id ? 'selected' : '') : '' }}>
                {{ $area->area }}</option>
        @endforeach
    </select>
    <small id="helpId" class="form-text text-muted">Área</small>
</div>
<div class="col-12 col-md-6 form-group">
    <label for="cargo">Cargo</label>
    <input type="text" class="form-control form-control-sm" name="cargo" id="cargo" aria-describedby="helpId"
        value="{{ old('cargo', $cargo->cargo ?? '') }}" placeholder="Nombre de cargo" required>
    <small id="helpId" class="form-text text-muted">Cargo</small>
</div>
