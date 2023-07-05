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
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                @if ($permiso == null || $permiso->listar)
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-hover table-sm tabla-borrando nowrap tabla_data_table_xl"
                            id="tablaEquipos">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center" style="white-space:nowrap;">Asigando</th>
                                    <th class="text-center" style="white-space:nowrap;">Estado</th>
                                    <th class="text-center" style="white-space:nowrap;">Fabricante</th>
                                    <th class="text-center" style="white-space:nowrap;">Número de serie</th>
                                    <th class="text-center" style="white-space:nowrap;">Tipo</th>
                                    <th class="text-center" style="white-space:nowrap;">Modelo</th>
                                    <th class="text-center" style="white-space:nowrap;">Sistema operativo - Nombre</th>
                                    <th class="text-center" style="white-space:nowrap;">Localización</th>
                                    <th class="text-center" style="white-space:nowrap;">Componentes - Procesador</th>
                                    <th class="text-center" style="white-space:nowrap;">Volumenes - Tamaño global</th>
                                    <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                    <th class="text-center" style="white-space:nowrap;">Componentes - Memoria</th>
                                    <th class="text-center" style="white-space:nowrap;">Fecha de compra</th>
                                    <th class="text-center" style="white-space:nowrap;">Meses en Uso</th>
                                    <th class="text-center" style="white-space:nowrap;">Porcentaje de uso </th>
                                    <th class="text-center" style="white-space:nowrap;">Centro de Costos</th>
                                    <th class="text-center" style="white-space:nowrap;">Proveedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equiposGLPI as $equipo)
                                    <tr>
                                        <td>{{ $equipo->usuario->firstname ?? '' }}
                                            {{ $equipo->usuario->realname ?? 'Sin Asignar' }}</td>
                                        <td class="text-center">{{ $equipo->estado->name ?? '---' }}</td>
                                        <td>{{ $equipo->fabricante->name ?? '' }}</td>
                                        <td>{{ $equipo->serial }}</td>
                                        <td>{{ $equipo->tipoComputador->name ?? '' }}</td>
                                        <td>{{ $equipo->modeloComputador->name ?? '' }}</td>
                                        <td>{{ $equipo->sistemaOp->name ?? '' }}</td>
                                        <td>{{ $equipo->locacion->name ?? '' }}</td>
                                        <td>{{ $equipo->procesadores[0]->designation ?? '' }}</td>
                                        <td>
                                            @foreach ($equipo->itemsdevicedrives as $item)
                                                <p>{{ number_format($item->capacity / 1000, 2) . ' GB' }}</p>
                                            @endforeach
                                        </td>
                                        <td>{{ $equipo->grupo->completename ?? '' }}</td>
                                        <td>
                                            @foreach ($equipo->itemsdevicememories as $item)
                                                <p>{{ number_format($item->size / 1000, 0) . ' GB' }}</p>
                                            @endforeach
                                        </td>
                                        <td>{{ $equipo->fec_compra ?? '' }}</td>
                                        <td>{{ $equipo->meses_uso ?? '' }} Meses
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
                                            <div class="progress">
                                                {!! $barras !!}
                                            </div>
                                        </td>
                                        <td class="text-right">{{ $equipo->porcentaje ?? '' }} %</td>
                                        <td>{{ $equipo->centro_costo ?? '---' }}</td>
                                        <td>{{ $equipo->proveedor ?? '---' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
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
                @endif
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/equipos/equipos.js') }}"></script>
@endsection
<!-- ************************************************************* -->
