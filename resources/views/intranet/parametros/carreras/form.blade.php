<div class="col-12 col-md-6 form-group">
    <label for="facultad_id">Facultad</label>
    <select class="form-control form-control-sm" id="facultad_id" name="facultad_id">
        <option value="">---Seleccione---</option>
        @foreach ($facultades as $facultad)
            <option value="{{ $facultad->id }}"
                {{ isset($carrera) ? ($facultad->id == $carrera->facultad_id ? 'selected' : '') : '' }}>
                {{ $facultad->facultad }}</option>
        @endforeach
    </select>
    <small id="helpId" class="form-text text-muted">Facultad</small>
</div>
<div class="col-12 col-md-6 form-group">
    <label for="carrera">Carrera</label>
    <input type="text" class="form-control form-control-sm" name="carrera" id="carrera" aria-describedby="helpId"
        value="{{ old('carrera', $carrera->carrera ?? '') }}" placeholder="Nombre de carrera" required>
    <small id="helpId" class="form-text text-muted">carrera</small>
</div>
<div class="col-12 col-md-6 form-group">
    <label for="abreb">Abrebriatura de carrera</label>
    <input type="text" class="form-control form-control-sm" name="abreb" id="abreb" aria-describedby="helpId"
        value="{{ old('abreb', $carrera->abreb ?? '') }}" placeholder="Nombre de carrera" required>
    <small id="helpId" class="form-text text-muted">Abrebriatura de carrera para carnet</small>
</div>
