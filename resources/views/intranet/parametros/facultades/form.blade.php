<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="facultad">Facultad</label>
            <input type="text" class="form-control" name="facultad" id="facultad" aria-describedby="helpId"
                value="{{ old('facultad', $facultad->facultad ?? '') }}" placeholder="Nombre de facultad" required>
            <small id="helpId" class="form-text text-muted">Facultad</small>
        </div>
    </div>
</div>
