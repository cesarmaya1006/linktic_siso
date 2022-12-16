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
    Dpenedencias
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
                    <h1 class="m-0">Crear Dependencia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventarios') }}">Inventarios</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dependencias') }}">Dependencias</a></li>
                        <li class="breadcrumb-item active">Dependencias -crear</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 text-md-right pl-2 pr-md-5">
                    <a href="{{ route('dependencias') }}"class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;">
                        <i class="fas fa-reply mr-2"></i> Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('dependencias-guardar') }}" class="form-horizontal row"
                        method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            @include('intranet.universidad.dependencias.form')
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
