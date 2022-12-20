@extends("theme.back.plantilla")
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
                    <h1 class="m-0">Nuevo Elemento de Inventario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventarios') }}">Inventarios</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('entradas-crear',['id' => $inventario->id]) }}">Entradas</a></li>
                        <li class="breadcrumb-item active">Inventarios - Nuevo Elemento</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 text-md-right pl-2 pr-md-5">
                    <a href="{{ route('entradas-crear',['id' => $inventario->id]) }}"class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;">
                        <i class="fas fa-reply mr-2"></i> Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('elementos-guardar') }}" class="form-horizontal row"
                        method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="inventario_id" value="{{ $inventario->id }}">
                                <div class="col-12 col-md-6 form-group">
                                    <label for="elemento" class="requerido">Nombre del Elemento</label>
                                    <input type="text" class="form-control form-control-sm" name="elemento" id="elemento"
                                        aria-describedby="helpId" value="{{ old('proveedor') }}"
                                        placeholder="Nombre del elemento" required>
                                    <small id="helpId" class="form-text text-muted">Nombre del Elemento</small>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label for="codigo">Codigo ó referencia</label>
                                    <input type="text" class="form-control form-control-sm" name="codigo" id="codigo"
                                        aria-describedby="helpId" value="{{ old('codigo') }}">
                                    <small id="helpId" class="form-text text-muted">Codigo ó referencia</small>
                                </div>
                                <div class="col-12 col-md-12 form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion"
                                        aria-describedby="helpId" value="{{ old('descripcion') }}">
                                    <small id="helpId" class="form-text text-muted">Descripción</small>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Guardar</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/carreras/carreras.js') }}"></script>
@endsection
<!-- ************************************************************* -->
