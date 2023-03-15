<div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" class="form-control" name="estado" id="estado" aria-describedby="helpId"
        value="{{ old('estado', $estado->estado ?? '') }}" placeholder="Estado" required>
    <small id="helpId" class="form-text text-muted">Estado</small>
</div>
