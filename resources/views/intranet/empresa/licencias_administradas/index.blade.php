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
Licencias Administradas
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado licencias administradas</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    @if ($permiso == null || $permiso->guardar)
                        <a href="{{ route('licencias_administradas-crear') }}"
                            class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end" style="max-width: 150px">
                            <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    @if ($permiso == null || $permiso->listar)
                        <div class="col-12 col-md-9 table-responsive text-center">
                            <table class="table table-striped table-hover table-sm tabla-borrando tabla_data_table_empleados"
                                id="tablaEquipos">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th class="text-center" style="white-space:nowrap;">Id</th>
                                        <th class="text-center" style="white-space:nowrap;">Departamento</th>
                                        <th class="text-center" style="white-space:nowrap;">Tipo de licencia</th>
                                        <th class="text-center" style="white-space:nowrap;">Cantidad</th>
                                        <th class="text-center" style="white-space:nowrap;">Asignado</th>
                                        <th class="text-center" style="white-space:nowrap;">Fecha de vencimiento</th>
                                        <th class="text-center" style="white-space:nowrap;">Cuenta de acceso</th>
                                        <th class="text-center" style="white-space:nowrap;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($licencias as $licencia)
                                        <tr>
                                            <td>{{ $licencia->id }}</td>
                                            <td>{{ $licencia->departamento }}</td>
                                            <td>{{ $licencia->licencia_tipo }}</td>
                                            <td>{{ $licencia->cantidad }}</td>
                                            <td>{{ $licencia->empleado->usuario }}</td>
                                            <td>{{ $licencia->fecha_vencimietno }}</td>
                                            <td>{{ $licencia->cuenta_acceso }}</td>
                                            <td>
                                                @if ($permiso == null || $permiso->actualizar == 1)
                                                    <a href="{{ route('licencias_administradas-editar', ['id' => $licencia->id]) }}"
                                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                        <i class="fas fa-pen-square"></i>
                                                    </a>
                                                @endif
                                                @if ($permiso == null || $permiso->borrar == 1)
                                                    <form
                                                        action="{{ route('licencias_administradas-eliminar', ['id' => $licencia->id]) }}"
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

@endsection
<!-- ************************************************************* -->
