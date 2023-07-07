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
    Equipos rentados asignados
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de equipos asignados</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a href="{{ route('admin-equipos_rentados_asignacion-crear') }}" class="btn btn-block btn-success btn-xs bg-gradient btn-sombra float-end"
                        style="max-width: 150px">
                        <i class="fa fa-fw fa-plus-circle"></i> Nueva asignación
                    </a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center" style="white-space:nowrap;">Id</th>
                                <th class="text-center" style="white-space:nowrap;">Asignación</th>
                                <th class="text-center" style="white-space:nowrap;">Proveedor</th>
                                <th class="text-center" style="white-space:nowrap;">Centro de Costo</th>
                                <th class="text-center" style="white-space:nowrap;">Sub-Centro de Costo</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo de Equipo</th>
                                <th class="text-center" style="white-space:nowrap;">Serial</th>
                                <th class="text-center" style="white-space:nowrap;">Codigo</th>
                                <th class="text-center" style="white-space:nowrap;">Tiket</th>
                                <th class="text-center" style="white-space:nowrap;">Fecha de Asignación</th>
                                <th class="text-center" style="white-space:nowrap;">Valor sin IVA</th>
                                <th class="text-center" style="white-space:nowrap;">Estado</th>
                                <th class="text-center" style="white-space:nowrap;">Meses de uso</th>
                                <th class="text-center" style="white-space:nowrap;">Fecha de Devolución</th>
                                <th class="text-center" style="white-space:nowrap;">Observaciones</th>
                                <th class="text-center" style="white-space:nowrap;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentados_asignados as $asignado)
                            <tr class="{{$asignado->equipo->rentado_estado_id == 3?'table-info':''}}">
                                <td>{{$asignado->id}}</td>
                                <td class="text-left">{{$asignado->asignado->asignado}}</td>
                                <td class="text-left">{{$asignado->equipo->proveedor->proveedor}}</td>
                                <td class="text-left">{{$asignado->equipo->centro_costo->proyecto}}</td>
                                <td class="text-left">{{$asignado->equipo->sub_centro_costo->centro??''}}</td>
                                <td class="text-center">{{$asignado->equipo->tipo->tipo}}</td>
                                <td class="text-center">{{$asignado->equipo->serial}}</td>
                                <td class="text-center">{{$asignado->equipo->codigo}}</td>
                                <td class="text-center">{{$asignado->equipo->tiket}}</td>
                                <td class="text-center">{{$asignado->fecha_asignacion}}</td>
                                <td class="text-right">$ {{ number_format($asignado->equipo->valor,2,'.',',')}}</td>
                                <td class="text-center">{{$asignado->equipo->estado->estado}}</td>
                                <td class="text-center">{{$asignado->meses_uso}}</td>
                                <td class="text-center">{{$asignado->fecha_devolucion??'---'}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <p style="text-align: justify">{{$asignado->equipo->observaciones}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @if ($asignado->equipo->rentado_estado_id==3)
                                    <a href="{{ route('admin-equipos_rentados-editar', ['id' => $asignado->equipo->id]) }}"
                                        class="btn-accion-tabla tooltipsC" title="Editar este registro"> Devolver
                                        <i class="fas fa-pen-square ml-2"></i>
                                    </a>
                                    @else
                                        <span class="badge bg-secondary">Devuelto</span>
                                    @endif
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
@endsection
<!-- ************************************************************* -->
