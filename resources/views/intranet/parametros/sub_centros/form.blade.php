<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label class="requerido" for="centro">Centro de Costo</label>
            <select class="form-control form-control-sm" name="centro_costo_id" id="centro_costo_id" data_url="{{route('sub_centros_costo_consecutivo')}}">
                <option value="">---Seleccione---</option>
                @foreach ($centros as $centro)
                    <option value="{{ $centro->id }}"
                        {{ isset($sub_centro) ? ($centro->id == $sub_centro->centro_costo_id ? 'selected' : '') : '' }}>
                        {{ $centro->proyecto }}</option>
                @endforeach
            </select>
            <small id="helpId" class="form-text text-muted">Centro de Costo</small>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label class="requerido" for="centro">Sub centro de costo</label>
            <input type="text" class="form-control form-control-sm" name="centro" id="centro" aria-describedby="helpId"
                value="{{ old('centro', $sub_centro->centro ?? '') }}" placeholder="Sub centro de costo" required>
            <small id="helpId" class="form-text text-muted">Sub centro</small>
        </div>
    </div>
    <div class="col-12 col-md-4 d-none">
        <div class="form-group">
            <label class="requerido" for="consecutivo">Consecutivo</label>
            <input type="hidden" name="consecutivo" id="consecutivo" value="{{ old('consecutivo', $sub_centro->consecutivo ?? '') }}" required>
            <span class="form-control form-control-sm"  id="consecutivo_span">{{ old('consecutivo', $sub_centro->consecutivo ?? '') }}</span>
            <small id="helpId" class="form-text text-muted">Consecutivo</small>
        </div>
    </div>
</div>
