@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')

@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Matriz Perfiles
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="card">
            @include('includes.error-form')
            @include('includes.mensaje')
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                        <h5>Editar Perfil</h5>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                        <a href="{{ route('matriz_perfiles') }}" class="btn btn-success btn-sm text-center pl-3 pr-3"
                            style="font-size: 0.9em;"><i class="fas fa-reply mr-2"></i> Volver</a>
                    </div>
                </div>
            </div>
                <form action="{{ route('admin-matriz_perfiles-actualizar', ['id' => $perfil->id]) }}"
                    class="form-horizontal row" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    @include('intranet.empresa.matriz_perfiles.form')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Actualizar</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
@endsection
<!-- ************************************************************* -->