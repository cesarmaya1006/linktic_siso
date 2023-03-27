@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')

<link rel="stylesheet" href="{{ asset('DataTables/Responsive-2.4.1/css/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('DataTables/Buttons-2.3.6/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('DataTables/Buttons-2.3.6/css/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/intranet/empresa/impresoras/impresoras.css') }}">

@endsection



<!-- ************************************************************* -->
@section('tituloHoja')
    Impresoras
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>listado de impresoras</h5>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap" id="tablaImpresoras_">
                        <thead class="thead-inverse">
                            <tr>
                                <th></th>
                                <th style="white-space:nowrap;">Nombre</th>
                                <th style="white-space:nowrap;">Usuario</th>
                                <th style="white-space:nowrap;">Grupos</th>
                                <th style="white-space:nowrap;">Estado</th>
                                <th style="white-space:nowrap;">Número de serie</th>
                                <th style="white-space:nowrap;">Fabricantes</th>
                                <th style="white-space:nowrap;">Localizaciones</th>
                                <th style="white-space:nowrap;">Tipo</th>
                                <th style="white-space:nowrap;">Modelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($impresorasGlpi as $impresora)
                            <tr>
                                <td></td>
                                <td>{{$impresora->name}}</td>
                                <td>{{$impresora->usuario->firstname?? ''}} {{$impresora->usuario->realname?? ''}}</td>
                                <td>{{$impresora->grupo->completename?? ''}}</td>
                                <td>{{$impresora->estado->name?? ''}}</td>
                                <td>{{$impresora->serial}}</td>
                                <td>{{$impresora->fabricante->name?? ''}}</td>
                                <td>{{$impresora->locacion->name?? ''}}</td>
                                <td>{{$impresora->tipoImpresora->name?? ''}}</td>
                                <td>{{$impresora->modeloImpresora->name?? ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/empresa/impresoras/impresoras.js') }}"></script>
<script src="{{asset('DataTables/Responsive-2.4.1/js/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('DataTables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/buttons.bootstrap5.min.js')}}"></script>

@endsection
<!-- ************************************************************* -->
