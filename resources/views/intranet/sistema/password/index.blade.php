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
    Cambio de Contraseña
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">

        </div>
        <div class="card-body pb-3">
            <form action="{{ route('cambiar-password_guardar', ['id' => session('id_usuario')]) }}" class="form-horizontal"
                method="POST">
                @csrf
                @method('put')
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="row mt-3">
                                <div class="col-12 col-md-8 form-group">
                                    <label for="password_new">Nueva Contraseña</label>
                                    <input type="password" class="form-control form-control-sm" name="password_new"
                                        id="password_new" aria-describedby="helpId" value=""
                                        placeholder="Nueva Contraseña" required>
                                    <small id="helpId" class="form-text text-muted">Mínimo 5 caracteres</small>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-8 form-group">
                                    <label for="password_rec">Confirmar Nueva Contraseña</label>
                                    <input type="password" class="form-control form-control-sm" name="password_rec"
                                        id="password_rec" aria-describedby="helpId" value=""
                                        placeholder="Confirmación Contraseña" required>
                                    <small id="helpId" class="form-text text-muted">Mínimo 5 caracteres</small>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 col-md-4">
                                    <div class="d-grid gap-2 mx-auto">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
@endsection
<!-- ************************************************************* -->
