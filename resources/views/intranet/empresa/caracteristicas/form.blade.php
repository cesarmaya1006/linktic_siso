<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="area" class="control-label requerido">Área</label>
            <input type="text" name="area" id="area" class="form-control form-control-sm" value="{{old('area', $caracteristica->area ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="sis_operativo" class="control-label requerido">Sistema Operativo</label>
            <select class="form-control form-control-sm" name="sis_operativo" id="sis_operativo">
                <option value="">--Seleccione--</option>
                @foreach ($sistemas_operativos as $sistemas_operativo)
                <option value="{{$sistemas_operativo->name}}" {{isset($caracteristica)?($sistemas_operativo->name==$caracteristica->sis_operativo?'selected':''):''}}>{{$sistemas_operativo->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="disco_duro" class="control-label requerido">Disco Duro</label>
            <input type="text" name="disco_duro" id="disco_duro" class="form-control form-control-sm" value="{{old('disco_duro', $caracteristica->disco_duro ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="ram" class="control-label requerido">Memoria Ram</label>
            <input type="text" name="ram" id="ram" class="form-control form-control-sm" value="{{old('ram', $caracteristica->ram ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="procesador" class="control-label requerido">Procesador</label>
            <input type="text" name="procesador" id="procesador" class="form-control form-control-sm" value="{{old('procesador', $caracteristica->procesador ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="tarj_video" class="control-label requerido">Tarjeta de video</label>
            <input type="text" name="tarj_video" id="tarj_video" class="form-control form-control-sm" value="{{old('tarj_video', $caracteristica->tarj_video ?? '')}}" required/>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="puertos" class="control-label requerido">Puertos</label>
            <input type="text" name="puertos" id="puertos" class="form-control form-control-sm" value="{{old('puertos', $caracteristica->puertos ?? '')}}" required/>
        </div>
    </div>
</div>
