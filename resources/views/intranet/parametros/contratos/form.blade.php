<div class="form-group">
    <label for="tipo">Tipo de Contrato</label>
    <input type="text" class="form-control" name="tipo" id="tipo" aria-describedby="helpId"
        value="{{ old('tipo', $contrato->tipo ?? '') }}" placeholder="Tipo de contrato" required>
    <small id="helpId" class="form-text text-muted">Contrato</small>
</div>
