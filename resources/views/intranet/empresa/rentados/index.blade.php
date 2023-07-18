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
    <link rel="stylesheet" href="{{ asset('css/intranet/empresa/impresoras/impresoras.css') }}">
@endsection



<!-- ************************************************************* -->
@section('tituloHoja')
    Equipos rentados
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de equipos</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    @if ($permiso == null || $permiso->guardar)
                        <a href="{{ route('admin-equipos_rentados_asignacion-crear') }}"
                            class="btn btn-block btn-success btn-xs bg-gradient btn-sombra float-end mt-md-2 ml-md-4"
                            style="max-width: 150px">
                            <i class="fas fa-luggage-cart"></i> Equipos en bodega
                        </a>
                        <a href="{{ route('admin-equipos_rentados-crear') }}"
                            class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end" style="max-width: 150px">
                            <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                        </a>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                @if ($permiso == null || $permiso->listar)
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-hover table-sm nowrap tabla_data_table_xl tabla-borrando"
                            id="tabla-data">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center" style="white-space:nowrap;">Id</th>
                                    <th class="text-center" style="white-space:nowrap;">Asignado</th>
                                    <th class="text-center" style="white-space:nowrap;">Fecha de Asignación</th>
                                    <th class="text-center" style="white-space:nowrap;">Meses de asignación</th>
                                    <th class="text-center" style="white-space:nowrap;">Proveedor</th>
                                    <th class="text-center" style="white-space:nowrap;">Centro de Costo</th>
                                    <th class="text-center" style="white-space:nowrap;">Sub-Centro de Costo</th>
                                    <th class="text-center" style="white-space:nowrap;">Ticket</th>
                                    <th class="text-center" style="white-space:nowrap;">Tipo de Equipo</th>
                                    <th class="text-center" style="white-space:nowrap;">Serial</th>
                                    <th class="text-center" style="white-space:nowrap;">Codigo</th>
                                    <th class="text-center" style="white-space:nowrap;">Fecha de Entrega Proveedor</th>
                                    <th class="text-center" style="white-space:nowrap;">Valor sin IVA</th>
                                    <th class="text-center" style="white-space:nowrap;">Estado</th>
                                    <th class="text-center" style="white-space:nowrap;">Meses de uso</th>
                                    <th class="text-center" style="white-space:nowrap;">Fecha de Devolución</th>
                                    <th class="text-center" style="white-space:nowrap;">Observaciones</th>
                                    <th class="text-center" style="white-space:nowrap;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentados as $equipo)
                                    <tr>
                                        <td>{{ $equipo->id }}</td>
                                        <td class="text-left">
                                            {{ $equipo->rentado_estado_id == 3 ? $equipo->asignaciones->last()->asignado->asignado ?? '---' : '---' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $equipo->rentado_estado_id == 3 ? $equipo->fecha_asignacion ?? '---' : '---' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $equipo->rentado_estado_id == 3 ? $equipo->meses_uso_renta ?? '---' : '---' }}
                                        </td>
                                        <td class="text-left">{{ $equipo->proveedor->proveedor }}</td>
                                        <td class="text-left">{{ $equipo->centro_costo->proyecto }}</td>
                                        <td class="text-left">{{ $equipo->sub_centro_costo->centro ?? '' }}</td>
                                        <td class="text-center">{{ $equipo->tiket }}</td>
                                        <td class="text-center">{{ $equipo->tipo->tipo }}</td>
                                        <td class="text-center">{{ $equipo->serial }}</td>
                                        <td class="text-center">{{ $equipo->codigo }}</td>
                                        <td class="text-center">{{ $equipo->fecha_entrega }}</td>
                                        <td class="text-right">$ {{ number_format($equipo->valor, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            {{ $equipo->rentado_estado_id === 2 ? 'Devuelto al proveedor' : $equipo->estado->estado }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $barras = '';
                                                if ($equipo->porcentaje <= 50) {
                                                    $barras .= '<div class="progress-bar bg-success" role="progressbar" style="width: ' . $equipo->porcentaje . '%" aria-valuenow="' . $equipo->porcentaje . '" aria-valuemin="0" aria-valuemax="100"></div>';
                                                } else {
                                                    $barras .= '<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';
                                                    if ($equipo->porcentaje <= 65) {
                                                        $barras .= '<div class="progress-bar" role="progressbar" style="width: ' . (50 - $equipo->porcentaje) . '%" aria-valuenow="' . (50 - $equipo->porcentaje) . '" aria-valuemin="0" aria-valuemax="100"></div>';
                                                    } else {
                                                        $barras .= '<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>';
                                                        if ($equipo->porcentaje <= 75) {
                                                            $barras .= '<div class="progress-bar bg-info" role="progressbar" style="width: ' . (65 - $equipo->porcentaje) . '%" aria-valuenow="' . (65 - $equipo->porcentaje) . '" aria-valuemin="0" aria-valuemax="100"></div>';
                                                        } else {
                                                            $barras .= '<div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
                                                            if ($equipo->porcentaje <= 85) {
                                                                $barras .= '<div class="progress-bar bg-warning" role="progressbar" style="width: ' . (75 - $equipo->porcentaje) . '%" aria-valuenow="' . (75 - $equipo->porcentaje) . '" aria-valuemin="0" aria-valuemax="100"></div>';
                                                            } else {
                                                                $barras .= '<div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
                                                                if ($equipo->porcentaje <= 100) {
                                                                    $barras .= '<div class="progress-bar bg-danger" role="progressbar" style="width: ' . (85 - $equipo->porcentaje) . '%" aria-valuenow="' . (85 - $equipo->porcentaje) . '" aria-valuemin="0" aria-valuemax="100"></div>';
                                                                } else {
                                                                    $barras .= '<div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            @endphp
                                            {{ $equipo->meses_uso }}
                                            <div class="progress">
                                                {!! $barras !!}
                                            </div>
                                            {{$equipo->porcentaje .' %'}}
                                        </td>
                                        <td class="text-center">{{ $equipo->fecha_devolucion ?? '---' }}</td>
                                        <td class="text-left">{{ $equipo->observaciones ?? '' }}</td>
                                        <td class="text-center">
                                            @if ($equipo->rentado_estado_id != 2)
                                                @if ($permiso == null || $permiso->actualizar == 1)
                                                    <a href="{{ route('admin-equipos_rentados-editar', ['id' => $equipo->id]) }}"
                                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                        <i class="fas fa-pen-square"></i>
                                                    </a>
                                                @endif
                                                @if ($permiso == null || $permiso->borrar == 1)
                                                    <form
                                                        action="{{ route('admin-equipos_rentados-eliminar', ['id' => $equipo->id]) }}"
                                                        class="d-inline form-eliminar" method="POST">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                            title="Eliminar este registro">
                                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                @endif
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
    @include('intranet.empresa.rentados.modales')
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/rentados/index.js') }}"></script>
@endsection
<!-- ************************************************************* -->
