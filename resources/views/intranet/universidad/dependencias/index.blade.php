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
    Dependencias
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dependencias</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('inventarios') }}">Inventarios</a></li>
                            <li class="breadcrumb-item active">Dependencias</li>
                        </ol>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 text-md-right pl-2 pr-md-5">
                        <a href="{{ route('dependencias-crear') }}" class="btn btn-success btn-sm text-center pl-3 pr-3"
                            style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Nueva dependencia</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    <div class="col-12 col-md-11 table-responsive">
                        <table class="table table-striped table-hover table-sm display">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th class="text-center">Usuario a cargo</th>
                                    <th class="text-center">Nombre de dependencia</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Email</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dependencias as $dependencia)
                                    <tr>
                                        <td class="text-center">{{ $dependencia->id }}</td>
                                        <td class="text-center">{{ $dependencia->usuario->persona->nombre1 . ' ' . $dependencia->usuario->persona->nombre2 . ' ' . $dependencia->usuario->persona->apellido1 . ' ' . $dependencia->usuario->persona->apellido2}}</td>
                                        <td class="text-center">{{ $dependencia->dependencia }}</td>
                                        <td class="text-center">{{ $dependencia->telefono }}</td>
                                        <td class="text-center">{{ $dependencia->direccion }}</td>
                                        <td class="text-center">{{ $dependencia->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dependencias-editar', ['id' => $dependencia->id]) }}"
                                                class="btn-accion-tabla tooltipsC text-info" title="Editar"><i
                                                    class="fa fa-edit" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
@endsection
<!-- ************************************************************* -->
