@php
    $meses = [1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'Noviembre', 12 => 'Diciembre'];
@endphp
<div class="row">
    <div class="col-12 col-md-3">
        <div class="form-group">
            <label for="nombre" class="control-label requerido"> Mes facturado </label>
            <select name="mes_facturado" id="mes_facturado" class="form-control form-control-sm" required>
                <option value="">--Seleccione--</option>
                @foreach ($meses as $mes)
                echo $mes;
                <option value="{{$mes}}" {{isset($pagos)?($pagos->mes_facturado==$mes?'selected':''):''}}>{{$mes}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="apellido" class="control-label requerido"> Ticket </label>
            <input type="text" name="ticket" id="ticket" class="form-control form-control-sm" value="{{old('ticket', $pagos->ticket ?? '')}}" required />
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="dominio" class="control-label requerido"> Dominio </label>
            <select type="text" name="dominio_id" id="dominio_id" class="form-control form-control-sm" required>
                <option value="">--Seleccione--</option>
                @foreach ($dominios ?? '' as $dominio)
                <option value="{{$dominio->id}}" {{isset($pagos)?($pagos->dominio_id==$dominio->id?'selected':''):''}}>{{$dominio->dominio}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="centro_costos_id" class="control-label requerido">Centro de Costo</label>
            <select class="form-control form-control-sm" name="centro_costos_id" id="centro_costos_id">
                <option value="">--Seleccione--</option>
                @foreach ($centros as $centro)
                <option value="{{$centro->id}}" {{isset($pagos)?($centro->id==$pagos->centro_costos_id?'selected':''):''}}>{{$centro->proyecto}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="form-group">
            <label for="ticket" class="control-label requerido">Fecha de pago</label>
            <input type="date" name="fecha_de_pago" id="fecha_de_pago" class="form-control form-control-sm" value="{{old('fecha_de_pago', $pagos->fecha_de_pago ?? '')}}" required />
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="costo_dolares" class="control-label requerido">Costos en dolares</label>
            <input type="text" name="costo_dolares" id="costo_dolares" class="form-control form-control-sm" value="{{old('costo_dolares', $pagos->costo_dolares??'')}}" required />

        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="costo_dolares" class="control-label requerido">Trm</label>
            <input type="text" name="trm" id="trm" class="form-control form-control-sm" value="{{old('trm', $pagos->trm??'')}}" required />

        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="costo_dolares" class="control-label">Costo Pesos</label>
            <input type="text" name="costo_pdfsesos" id="costo_pesdfsos" readonly class="form-control form-control-sm" value="{{old('costo_pesos', $pagos->costo_pesos??'')}}"  />
        </div>
    </div>
</div>
