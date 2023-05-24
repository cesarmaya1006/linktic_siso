<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="dominio" class="control-label requerido">Nombre Dominio </label>
            <input name="dominio" id="dominio" class="form-control form-control-sm"
            pattern="[a-z0-9.-]+\.[a-z]{2,}$" 
            value="{{old('dominio', $dominio->dominio ?? '')}}" required/>
        </div>
    </div>
</div>
