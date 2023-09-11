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
    Asignación de equipos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Editar Asignación</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('asignacion_equipos') }}" class="btn btn-success btn-sm text-center pl-3 pr-3"
                        style="font-size: 0.9em;"><i class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('asignacion_equipos-actualizar', ['id' => $asignacion->id]) }}" class="form-horizontal row" method="POST"
                            autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                @include('intranet.empresa.asignacion_equipos.form')
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Actualizar</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
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
<script src="{{ asset('js/intranet/empresa/asignacion_equipos/crear.js') }}"></script>
@endsection
<!-- ************************************************************* -->