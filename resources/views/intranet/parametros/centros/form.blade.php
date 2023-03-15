<div class="form-group">
    <label for="centro_costo">Centro de Costo</label>
    <input type="text" class="form-control" name="centro_costo" id="centro_costo" aria-describedby="helpId"
        value="{{ old('centro_costo', $centro->centro_costo ?? '') }}" placeholder="Centro de Costo" required>
    <small id="helpId" class="form-text text-muted">Centro de Costo</small>
</div>
