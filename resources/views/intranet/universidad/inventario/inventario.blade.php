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
                                <a href="#" class="small-box-footer">mas información <i
                                        class="fas fa-arrow-circle-down"></i></a>
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
                                <div class="row">
                                    <div class="col-12 col-md-8"><h3 class="card-title">{{$dependencia->dependencia}}</h3></div>
                                    <div class="col-12 col-md-3">
                                        <a
                                            href="{{ route('inventarios-crear',['id'=>$dependencia->id]) }}"
                                            class="btn btn-success btn-sm text-center pl-3 pr-3 float-end"
                                            style="font-size: 0.9em;">
                                            <i class="fas fa-plus-circle mr-2"></i> Nuevo Inventario
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <div class="card-tools pt-2">
                                            <button type="button" class="btn btn-tool float-end" data-card-widget="collapse"><i
                                                    class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light bg-gradient" style="display: none;">
                                @foreach ($dependencia->inventarios as $inventario)
                                <div class="card card-primary collapsed-card">
                                    <div class="card-header bg-primary bg-gradiente">
                                        <h3 class="card-title">{{$inventario->nom_inventario}}</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <div class="d-grid gap-2">
                                                            <a href="{{ route('inventarios-editar',['id'=>$inventario->id]) }}" class="btn btn-primary btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i class="fa fa-edit mr-2"></i> Editar Inventario</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <div class="d-grid gap-2">
                                                            <a href="{{ route('entradas-crear',['id'=>$inventario->id]) }}" class="btn btn-warning btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Entradas Inventario</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <div class="d-grid gap-2">
                                                            <a href="{{ route('salidas-crear',['id'=>$inventario->id]) }}" class="btn {{$inventario->productos->sum('cantidad') > 0 ? 'btn-danger': 'btn-secondary'}} btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;{{$inventario->productos->sum('cantidad') > 0 ? '': 'pointer-events: none;'}}"><i class="fas fa-minus-circle mr-2"></i> Salidas Inventario</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <div class="d-grid gap-2">
                                                            <a href="{{ route('prestamos',['id'=>$inventario->id]) }}" class="btn {{$inventario->productos->sum('stock') > 0 ? 'btn-info': 'btn-secondary'}} btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;{{$inventario->productos->sum('stock') > 0 ? '': 'pointer-events: none;'}}"><i class="fas fa-people-carry mr-2"></i> Prestamos - {{$inventario->productos->sum('cantidad') - $inventario->productos->sum('stock')}} elementos</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8 table-responsive">
                                                <table class="table table-striped table-hover table-sm display">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th scope="col">Codigo</th>
                                                            <th class="text-center">Elemento</th>
                                                            <th class="text-center">Referencia</th>
                                                            <th class="text-center">Cantidad</th>
                                                            <th class="text-center">Stock</th>
                                                            <th class="text-center">Valor del Inventario</th>
                                                            <th class="text-center">Descripción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($inventario->productos as $producto)
                                                            <tr>
                                                                <td class="text-center">{{ $producto->id }}</td>
                                                                <td class="text-center">{{ $producto->elemento }}</td>
                                                                <td class="text-center">{{ $producto->codigo }}</td>
                                                                <td class="text-center">{{ $producto->cantidad }}</td>
                                                                <td class="text-center">{{ $producto->stock }}</td>
                                                                <td class="text-center">{{ $producto->precio }}</td>
                                                                <td class="text-center">{{ $producto->descripcion }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
