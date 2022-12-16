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
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Inventarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Inventarios</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @if ($usuario->roles[0]->id < 3)
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $dependencias->count() }}</h3>
                                    <p>Dependencias</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('dependencias') }}" class="small-box-footer">mas información <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                    @if ($dependencias->count() && ($usuario->roles[0]->id < 3 || $usuario->dependencias->count()))
                        @php
                            $totalInventarios = 0;
                            foreach ($dependencias as $dependencia) {
                                $totalInventarios += $dependencia->inventarios->count();
                            }
                            $totalInventariosU = 0;
                            foreach ($usuario->dependencias as $dependencia) {
                                $totalInventariosU += $dependencia->inventarios->count();
                            }
                        @endphp
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-primary bg-gradient">
                                <div class="inner">
                                    <h3>{{ $usuario->roles[0]->id < 3 ? $totalInventarios : $totalInventariosU }}</h3>
                                    <p>{{ $usuario->roles[0]->id < 3 ? 'Total Inventarios' : 'Inventarios Asignados' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('inventarios') }}" class="small-box-footer">mas información <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="container-fluid">
                @if ($dependencias->count() && $usuario->roles[0]->id < 3)
                @php
                    $dependenciasFor = $dependencias;
                @endphp
                @elseif ($dependencias->count() && $usuario->dependencias->count())
                @php
                    $dependenciasFor = $usuario->dependencias;
                @endphp
                @endif
                @if ($dependencias->count())
                @foreach ($dependenciasFor as $dependencia)
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="card bg-secondary bg-gradient collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">{{$dependencia->dependencia}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                <div class="row d-flex justify-content-evenly mt-3 mb-3">
                                    <div class="col-12 col-md-2 text-center"><a href="#" class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Nuevo Inventario</a></div>
                                    <div class="col-12 col-md-2 text-center"><a href="#" class="btn btn-primary btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i class="fa fa-edit mr-2"></i> Editar Inventario</a></div>
                                    <div class="col-12 col-md-2 text-center"><a href="#" class="btn btn-warning btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Entradas Inventario</a></div>
                                    <div class="col-12 col-md-2 text-center"><a href="#" class="btn btn-danger btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Salidas Inventario</a></div>
                                    <div class="col-12 col-md-2 text-center"><a href="#" class="btn btn-info btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Prestamos</a></div>
                                </div>

                                @foreach ($dependencia->inventarios as $inventario)
                                <div class="row">
                                    <div class="col-12 mb-3 pl-3">
                                        <h6>{{$inventario->nom_inventario}}</h6>
                                    </div>
                                </div>
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
@endsection
<!-- ************************************************************* -->
