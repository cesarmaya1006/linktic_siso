<div class="form-group">
    <label for="empresa">Empresa</label>
    <input type="text" class="form-control" name="empresa" id="empresa" aria-describedby="helpId"
        value="{{ old('empresa', $empresa->empresa ?? '') }}" placeholder="Empresa" required>
    <small id="helpId" class="form-text text-muted">Empresa</small>
</div>
