<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="requerido" for="proveedor">Proveedor</label>
            <input type="text" class="form-control form-control-sm" name="proveedor" id="proveedor" aria-describedby="helpId"
                value="{{ old('proveedor', $proveedor->proveedor ?? '') }}" placeholder="Nombre de proveedor" required>
            <small id="helpId" class="form-text text-muted">Nombre del Proveedor</small>
        </div>
    </div>
</div>
