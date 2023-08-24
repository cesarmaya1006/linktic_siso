@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Matríz de Cuentas Corporativas
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Matríz de Cuentas Corporativas</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">

                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    @if ($permiso == null || $permiso->listar)
                        <div class="col-12">
                            @csrf
                            <table class="table table-striped table-hover table-bordered table-sm tabla-borrando nowrap tabla_data_table_corporativas" id="tabla-data">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th class="text-center text-nowrap" >Cargos</th>
                                        @foreach ($cuentas as $cuenta)
                                            <th class="text-center">{{ $cuenta->cuenta }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        if ($permiso == null || $permiso->actualizar == 1) {
                                            $actualizar = 1;
                                        } else {
                                            $actualizar = 0;
                                        }
                                    @endphp
                                    @foreach ($cargos as $cargo)
                                        <tr>
                                            <td class="text-center">{{ $cargo['cargo'] }}</td>
                                            @foreach ($cuentas as $id => $cuenta)
                                                <td class="text-center">
                                                    <input type="checkbox" class="cuenta_cargo" name="cuenta_cargo[]"
                                                        data-cuentaid={{ $cuenta['id'] }} value="{{ $id }}"
                                                        @if ($cargo->matriz_cuentas_corporativas->where('cuenta_corporativa_id', $cuenta->id)->where('matriz_cargo_id', $cargo->id)->count() > 0) checked
                                                    onclick="des_asignacion('{{ route('matriz_cuentas_corporativas_desasignacion', ['matriz_cargo_id' => $cargo->id, 'cuenta_corporativa_id' => $cuenta->id]) }}')"
                                                    @else
                                                    onclick="asignacion('{{ route('matriz_cuentas_corporativas_asignacion', ['matriz_cargo_id' => $cargo->id, 'cuenta_corporativa_id' => $cuenta->id]) }}')" @endif
                                                        {{ $actualizar == 0 ? 'disabled' : '' }}>
                                                </td>
                                            @endforeach
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
        <div class="card-footer">

        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/matriz_cuentas_corporativas/matriz_cuentas_corporativas.js') }}"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
@endsection
<!-- ************************************************************* -->
