<div class="form-group">
    <label for="cuenta">Cuenta Corporativa</label>
    <input type="text" class="form-control" name="cuenta" id="cuenta" aria-describedby="helpId"
        value="{{ old('cuenta', $cuenta->cuenta ?? '') }}" placeholder="Nombre de cuenta" required>
    <small id="helpId" class="form-text text-muted">Cuenta Corporativa</small>
</div>
