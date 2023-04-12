<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label class="requerido" for="estado">Estado</label>
            <input type="text" class="form-control form-control-sm" name="estado" id="estado" aria-describedby="helpId"
                value="{{ old('estado', $estado_rentado->estado ?? '') }}" placeholder="Estado PC's Rentados" required>
            <small id="helpId" class="form-text text-muted">Estado PC's Rentados</small>
        </div>
    </div>
</div>
