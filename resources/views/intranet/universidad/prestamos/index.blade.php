@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <!-- <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}"> -->
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Inventarios
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
                        <h1 class="m-0">Inventarios - Prestamos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('inventarios') }}">Inventarios</a></li>
                            <li class="breadcrumb-item active">Inventarios - Prestamos</li>
                        </ol>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 text-md-right pl-2 pr-md-5">
                        <a href="{{ route('prestamos-crear',['id' => $inventario->id]) }}" class="btn btn-success btn-sm text-center pl-3 pr-3"
                            style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Registra prestamo</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-11 table-responsive">
                        <table class="table table-striped table-hover table-sm display">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th class="text-center">Persona que solicita el prestamo</th>
                                    <th class="text-center">Tipo de usuario</th>
                                    <th class="text-center">Ubicación</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Fecha y Hora de Prestamo</th>
                                    <th class="text-center">Fecha y hora de vencimiento</th>
                                    <th class="text-center">Observaciones</th>
                                    <th class="text-center">Estado del prestamo</th>
                                    <th class="text-center">Persona que hace el prestamo</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prestamos as $prestamo)
                                    <tr class="{{ $prestamo->estado == 1 ? 'bg-success bg-gradient': 'bg-danger bg-gradient'}}">
                                        <td class="text-center">{{ $prestamo->id }}</td>
                                        <td class="text-center">{{ $prestamo->persona->nombre1 . ' ' . $prestamo->persona->nombre2 . ' ' . $prestamo->persona->apellido1 . ' ' . $prestamo->persona->apellido2 }}</td>
                                        <td class="text-center text-capitalize">{{ $prestamo->persona->usuario->roles[0]->nombre}}</td>
                                        <td class="text-center">{{ $prestamo->persona->cargo_id == null ? $prestamo->persona->carrera->facultad->facultad . ' - ' . $prestamo->persona->carrera->carrera : $prestamo->persona->cargo->area->area .' - ' .  $prestamo->persona->cargo->cargo}}</td>
                                        <td class="text-center">{{ $prestamo->persona->telefono }}</td>
                                        <td class="text-center">{{ $prestamo->producto->elemento }}</td>
                                        <td class="text-center">{{ $prestamo->cantidad }}</td>
                                        <td class="text-center">{{ $prestamo->fec_prestamo ." - " . $prestamo->hor_prestamo }}</td>
                                        <td class="text-center">{{ $prestamo->fec_vencimiento ." - " . $prestamo->hor_vencimiento }}</td>
                                        <td class="text-center">{{ $prestamo->observaciones }}</td>
                                        <td class="text-center">{{ $prestamo->estado == 1 ? 'Vigente': 'Vencida'}}</td>
                                        <td class="text-center">{{ $prestamo->id }}</td>
                                        <td class="text-center bg-white">
                                            <a  href="{{route('prestamos-devolucion',['id' => $prestamo->id])}}"
                                                class="btn-accion-tabla tooltipsC text-info"
                                                title="Hacer devolución">
                                                <i class="fas fa-share-square" aria-hidden="true"></i>
                                            </a>
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
