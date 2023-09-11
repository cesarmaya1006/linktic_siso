@extends('theme.back.plantilla')
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
    <link rel="stylesheet" href="{{ asset('dataTable/buttons.dataTables.min.css') }}">
@endsection



<!-- ************************************************************* -->
@section('tituloHoja')
    Asignación Equipos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado asignación de equipos</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    @if ($permiso == null || $permiso->guardar)
                        <a href="{{ route('asignacion_equipos-crear') }}"
                            class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end" style="max-width: 150px">
                            <i class="fa fa-fw fa-plus-circle"></i> Nueva asignación
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    @if ($permiso == null || $permiso->listar)
                        <div class="col-12 table-responsive">
                            <table class="table table-striped table-hover table-sm tabla-borrando tabla_data_table_empleados"
                                id="tablaEquipos">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th class="text-center" style="white-space:nowrap;">Id</th>
                                        <th class="text-center" style="white-space:nowrap;">Nombre</th>
                                        <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                        <th class="text-center" style="white-space:nowrap;">Jefe Directo</th>
                                        <th class="text-center" style="white-space:nowrap;">CC</th>
                                        <th class="text-center" style="white-space:nowrap;">Ticket</th>
                                        <th class="text-center" style="white-space:nowrap;">Fecha de Solicitud</th>
                                        <th class="text-center" style="white-space:nowrap;">Fecha de Ingreso</th>
                                        <th class="text-center" style="white-space:nowrap;">Estado</th>
                                        <th class="text-center" style="white-space:nowrap;">Comentarios</th>
                                        <th class="text-center" style="white-space:nowrap;">Equipo a Asignar</th>
                                        <th class="text-center" style="white-space:nowrap;">Cometario Equipo</th>
                                        <th class="text-center" style="white-space:nowrap;">Ticket Renta</th>
                                        <th class="text-center" style="white-space:nowrap;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaciones as $asignacion)
                                        <tr>
                                            <td>{{ $asignacion->id }}</td>
                                            <td>{{ $asignacion->nombre }}</td>
                                            <td>{{ $asignacion->cargo }}</td>
                                            <td>{{ $asignacion->jefe_directo }}</td>
                                            <td>{{ $asignacion->cenco->centro }}</td>
                                            <td>{{ $asignacion->tikect }}</td>
                                            <td>{{ $asignacion->fecha_solicitud }}</td>
                                            <td>{{ $asignacion->fecha_ingreso }}</td>
                                            <td>{{ $asignacion->estado }}</td>
                                            <td>{{ $asignacion->comentarios }}</td>
                                            <td>{{ $asignacion->equipo }}</td>
                                            <td>{{ $asignacion->comentarios_equipo==''?'---': $asignacion->comentarios_equipo}}</td>
                                            <td>{{ $asignacion->tikect_renta }}</td>
                                            <td>
                                                @if ($permiso == null || $permiso->actualizar == 1)
                                                    <a href="{{ route('asignacion_equipos-editar', ['id' => $asignacion->id]) }}"
                                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                        <i class="fas fa-pen-square"></i>
                                                    </a>
                                                @endif
                                                @if ($permiso == null || $permiso->borrar == 1)
                                                    <form
                                                        action="{{ route('asignacion_equipos-eliminar', ['id' => $asignacion->id]) }}"
                                                        class="d-inline form-eliminar" method="POST">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                            title="Eliminar este registro">
                                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h3>Aviso del sistema</h3>
                                    </span>
                                    <span class="info-box-text">
                                        <h5>Su rol no tiene permisos de listar en este modulo</h5>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
    <!-- Modales -->
    <!-- ============================================================================== -->
    <!-- Modal Otros -->
    <!-- Modal -->
    <div class="modal fade" id="otrosModal" tabindex="-1" aria-labelledby="otrosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="otrosModalLabel">Otros Elementos Asignados al Usuario</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyOtros">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li><Strong></Strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/asignacion_equipos/asignacion.js') }}"></script>
@endsection
<!-- ************************************************************* -->