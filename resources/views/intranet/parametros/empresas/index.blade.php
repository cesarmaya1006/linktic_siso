@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Parametros - Empresas
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de Empresas</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    @if ($permiso == null || $permiso->guardar)
                        <a href="{{ route('admin-empresas-crear') }}" class="btn btn-success btn-sm text-center pl-3 pr-3"
                            style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Nueva Empresa</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    @if ($permiso == null || $permiso->listar)
                        <div class="col-10 col-md-7 table-responsive">
                            <table class="table table-striped table-hover table-sm tabla_data_table_xs tabla-borrando"
                                id="tabla-data">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th class="text-center">Empresa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td class="text-center">{{ $empresa->empresa }}</td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->actualizar == 1)
                                                    <a href="{{ route('admin-empresas-editar', ['id' => $empresa->id]) }}"
                                                        class="btn-accion-tabla tooltipsC text-info" title="Editar"><i
                                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                                @endif
                                                @if ($permiso == null || $permiso->borrar == 1)
                                                    <form
                                                        action="{{ route('admin-empresas-eliminar', ['id' => $empresa->id]) }}"
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
    <script src="{{ asset('js/intranet/empresas_costo/empresas.js') }}"></script>
@endsection
<!-- ************************************************************* -->
