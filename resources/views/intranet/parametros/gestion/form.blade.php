<div class="form-group">
    <label for="gestion">Gestión</label>
    <input type="text" class="form-control" name="gestion" id="gestion" aria-describedby="helpId"
        value="{{ old('gestion', $gestion->gestion ?? '') }}" placeholder="Gestión" required>
    <small id="helpId" class="form-text text-muted">Gestión</small>
</div>
