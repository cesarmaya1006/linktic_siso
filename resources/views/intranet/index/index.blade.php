@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @if ($usuario->camb_password == 0)
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                </div>
            </div>
            @include('intranet.index.indexadmin')
        </div>
    @else
        @include('intranet.index.cambiopassword')
    @endif
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/index/index.js') }}"></script>
@endsection
