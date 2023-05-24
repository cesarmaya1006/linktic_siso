<div class="form-group">
    <label for="perfil">Perfil</label>
    <input type="text" class="form-control" name="perfil" id="perfil" aria-describedby="helpId"
        value="{{ old('perfil', $perfil->perfil ?? '') }}" placeholder="Nombre del perfil" required>
    <small id="helpId" class="form-text text-muted">Perfil</small>
</div>
