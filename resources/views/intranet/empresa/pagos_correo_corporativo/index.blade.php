@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')

@endsection



<!-- ************************************************************* -->
@section('tituloHoja')
    Correos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de Pagos realizados</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a href="{{ route('pagos-create') }}" class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end"
                        style="max-width: 150px">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-hover table-sm tabla-borrando nowrap" id="tabla_correos">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center" style="white-space:nowrap;">Id</th>
                                    <th class="text-center" style="white-space:nowrap;">mes_facturado</th>
                                    
                                    <th class="text-center" style="white-space:nowrap;">ticket</th>
                                    <th class="text-center" style="white-space:nowrap;">dominio</th>
                                    <th class="text-center" style="white-space:nowrap;">fecha de pago</th>
                        
                                    <th class="text-center" style="white-space:nowrap;">Centro de costos</th>
                                    <th class="text-center" style="white-space:nowrap;">Costo en dolares</th>
                                    <th class="text-center" style="white-space:nowrap;"> Trm </th>
                                    <th class="text-center" style="white-space:nowrap;"> Costo en pesos </th>
                                    <th class="text-center" style="white-space:nowrap;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                <tr>
                                    <td>{{$pago->id}}</td>
                                    <td>{{$pago->mes_facturado??'---'}}</td>
                                    <td>{{$pago->ticket??'---'}}</td>
                                    <td>{{$pago->dominio->dominio??'---'}}</td>
                                    <td>{{$pago->fecha_de_pago??'---'}}</td>
                                    <td>{{$pago->centro->proyecto??'---'}}</td> 
                                    <td class="text-center">${{$pago->costo_dolares??'---'}}</td>
                                    <td>${{$pago->trm??'---'}}</td>
                                    <td class="text-center">${{number_format($pago->costo_pesos,0,"",'.')?? '---'}}</td> 
                                    <td class=" pl-3 pr-3" style="white-space:nowrap;">
                                        <a href="{{ route('pagos-editar', ['id' => $pago->id]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                       
                                        <form action="{{ route('pagos-eliminar', ['id' => $pago->id]) }}"
                                            class="d-inline form-eliminar" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                title="Eliminar este registro">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/empresa/correos/correos.js') }}"></script>
@endsection
<!-- ************************************************************* -->
