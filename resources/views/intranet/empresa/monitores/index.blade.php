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
<link rel="stylesheet" href="{{ asset('css/intranet/empresa/monitores/monitores.css') }}">

@endsection



<!-- ************************************************************* -->
@section('tituloHoja')
    Monitores
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>listado de monitores</h5>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap" id="tablaMonitores">
                        <thead class="thead-inverse">
                            <tr>
                                <th></th>
                                <th style="white-space:nowrap;">Nombre</th>
                                <th style="white-space:nowrap;">Entidad</th>
                                <th style="white-space:nowrap;">Estado</th>
                                <th style="white-space:nowrap;">Fabricantes</th>
                                <th style="white-space:nowrap;">Número de serie</th>
                                <th style="white-space:nowrap;">Localizaciones</th>
                                <th style="white-space:nowrap;">Tipo</th>
                                <th style="white-space:nowrap;">Modelo</th>
                                <th style="white-space:nowrap;">Usuario</th>
                                <th style="white-space:nowrap;">Última Actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monitoresGlpi as $monitor)
                            <tr>
                                <td></td>
                                <td>{{$monitor->name}}</td>
                                <td>{{$monitor->entidad->completename}}</td>
                                <td>{{$monitor->estado->name?? ''}}</td>
                                <td>{{$monitor->fabricante->name?? ''}}</td>
                                <td>{{$monitor->serial}}</td>
                                <td>{{$monitor->locacion->name?? ''}}</td>
                                <td>{{$monitor->tipoMonitor->name?? ''}}</td>
                                <td>{{$monitor->modeloMonitor->name?? ''}}</td>
                                <td>{{$monitor->usuario->firstname?? ''}} {{$monitor->usuario->realname?? ''}}</td>
                                <td>{{$monitor->date_mod}}</td>
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
<script src="{{ asset('js/intranet/empresa/monitores/monitores.js') }}"></script>
<script src="{{asset('DataTables/Responsive-2.4.1/js/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('DataTables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/buttons.bootstrap5.min.js')}}"></script>

@endsection
<!-- ************************************************************* -->
