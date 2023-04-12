<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label class="requerido" for="responsable">Responsable</label>
            <input type="text" class="form-control form-control-sm" name="responsable" id="responsable" aria-describedby="helpId"
                value="{{ old('responsable', $responsable->responsable ?? '') }}" placeholder="Responsable PC's Rentados" required>
            <small id="helpId" class="form-text text-muted">Responsable PC's Rentados</small>
        </div>
    </div>
</div>
