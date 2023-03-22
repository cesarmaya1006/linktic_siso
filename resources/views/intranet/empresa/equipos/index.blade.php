@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/empresa/equipos/equipos.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/buttons.dataTables.min.css') }}">

@endsection



<!-- ************************************************************* -->
@section('tituloHoja')
    Equipos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>listado de equipos</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('admin-equipos-crear') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Registro de equipos</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm tabla-borrando nowrap" id="tablaEquipos">
                        <thead class="thead-inverse">
                            <tr>
                                <th></th>
                                <th></th>
                                <th style="white-space:nowrap;">Nombre<span class="sort-indicator"><i class="fas fa-sort-up"></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Entidad<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Usuario<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Estado<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Fabricantes<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Número de serie<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Tipo<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Modelo<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Sistema operativo - Nombre<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Localizaciones<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Componentes - Procesadores<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Volumes - Tamaño global<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Componentes - Memoria<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Grupos<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equiposGLPI as $equipo)
                            <tr>
                                <td></td>
                                <td><a href="{{ route('admin-equipos-editar', ['id' => $equipo->id]) }}"
                                    class="btn-accion-tabla tooltipsC text-info" title="Editar"><i
                                        class="fa fa-edit" aria-hidden="true"></i></a></td>
                                <td>{{$equipo->name}}</td>
                                <td>{{$equipo->entidad->completename}}</td>
                                <td>{{$equipo->usuario->firstname?? ''}} {{$equipo->usuario->realname?? ''}}</td>
                                <td>{{$equipo->estado->name?? ''}}</td>
                                <td>{{$equipo->fabricante->name?? ''}}</td>
                                <td>{{$equipo->serial}}</td>
                                <td>{{$equipo->tipoComputador->name?? ''}}</td>
                                <td>{{$equipo->modeloComputador->name?? ''}}</td>
                                <td>{{$equipo->sistemaOp->name?? ''}}</td>
                                <td>{{$equipo->locacion->name?? ''}}</td>
                                <td>{{$equipo->procesadores[0]->designation?? ''}}</td>
                                <td>
                                    @foreach ($equipo->itemsdevicedrives as $item)
                                    <p>{{number_format(($item->capacity)/1000,2).' GB'}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($equipo->itemsdevicememories as $item)
                                    <p>{{number_format(($item->size)/1000,0).' GB'}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    {{$equipo->grupo->completename?? ''}}
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
<script src="{{ asset('js/intranet/empresa/equipos/equipos.js') }}"></script>
<script src="{{ asset('dataTable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dataTable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dataTable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dataTable/jszip.min.js') }}"></script>
<script src="{{ asset('dataTable/buttons.html5.min.js') }}"></script>

@endsection
<!-- ************************************************************* -->
