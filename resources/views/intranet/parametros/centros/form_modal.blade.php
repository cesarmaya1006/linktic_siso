<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="requerido" for="centro">Centro</label>
            <input type="text" class="form-control" name="centro" id="centro" aria-describedby="helpId"
                value="{{ old('centro', $centro->centro ?? '') }}" placeholder="Centro de Costo" required>
            <small id="helpId" class="form-text text-muted">Centro de Costo</small>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="requerido" for="proyecto">Proyecto</label>
            <input type="text" class="form-control" name="proyecto" id="proyecto" aria-describedby="helpId"
                value="{{ old('proyecto', $centro->proyecto ?? '') }}" placeholder="Proyecto" required>
            <small id="helpId" class="form-text text-muted">Proyecto</small>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="requerido" for="gerente">Gerente</label>
            <input type="text" class="form-control" name="gerente" id="gerente" aria-describedby="helpId"
                value="{{ old('gerente', $centro->gerente ?? '') }}" placeholder="Gerente" required>
            <small id="helpId" class="form-text text-muted">Gerente</small>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="requerido" for="estado">Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" aria-describedby="helpId"
                value="{{ old('estado', $centro->estado ?? '') }}" placeholder="Estado" required>
            <small id="helpId" class="form-text text-muted">Estado</small>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="requerido" for="empresa">Empresa</label>
            <input type="text" class="form-control" name="empresa" id="empresa" aria-describedby="helpId"
                value="{{ old('empresa', $centro->empresa ?? '') }}" placeholder="Empresa" required>
            <small id="helpId" class="form-text text-muted">Empresa</small>
        </div>
    </div>
</div>
