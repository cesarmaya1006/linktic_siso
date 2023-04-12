<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label class="requerido" for="tipo">Tipo</label>
            <input type="text" class="form-control form-control-sm" name="tipo" id="tipo" aria-describedby="helpId"
                value="{{ old('tipo', $tipo->tipo ?? '') }}" placeholder="Tipo PC's Rentados" required>
            <small id="helpId" class="form-text text-muted">Tipo PC's Rentados</small>
        </div>
    </div>
</div>
