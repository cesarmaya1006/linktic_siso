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
    Matriz Características Pc
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de Características</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a href="{{ route('admin-matriz_caracteristicas-crear') }}" class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end"
                        style="max-width: 150px">
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                    </a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th></th>
                                <th class="text-center" style="white-space:nowrap;">Áreas</th>
                                <th class="text-center" style="white-space:nowrap;">Sistema operativo</th>
                                <th class="text-center" style="white-space:nowrap;">Disco duro</th>
                                <th class="text-center" style="white-space:nowrap;">Memoria Ram</th>
                                <th class="text-center" style="white-space:nowrap;">Procesador</th>
                                <th class="text-center" style="white-space:nowrap;">Tarjeta de video</th>
                                <th class="text-center" style="white-space:nowrap;">Puertos</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($caracteristicas as $caracteristica)
                            <tr>
                                <td></td>
                                <td>{{$caracteristica->area}}</td>
                                <td>{{$caracteristica->sis_operativo}}</td>
                                <td>{{$caracteristica->disco_duro}}</td>
                                <td>{{$caracteristica->ram}}</td>
                                <td>{{$caracteristica->procesador}}</td>
                                <td>{{$caracteristica->tarj_video}}</td>
                                <td>{{$caracteristica->puertos}}</td>
                                <td>
                                    <a href="{{ route('admin-matriz_caracteristicas-editar', ['id' => $caracteristica->id]) }}"
                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <form action="{{ route('admin-matriz_caracteristicas-eliminar', ['id' => $caracteristica->id]) }}"
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
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/empresa/caracteristicas/editar.js') }}"></script>
<script src="{{asset('DataTables/Responsive-2.4.1/js/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('DataTables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.3.6/js/buttons.bootstrap5.min.js')}}"></script>

@endsection
<!-- ************************************************************* -->
