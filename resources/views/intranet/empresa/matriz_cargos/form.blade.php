<div class="form-group">
    <label for="cargo">Cargo</label>
    <input type="text" class="form-control" name="cargo" id="cargo" aria-describedby="helpId"
        value="{{ old('cargo', $cargo->cargo ?? '') }}" placeholder="Nombre del cargo" required>
    <small id="helpId" class="form-text text-muted">Cargo</small>
</div>
