@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <!--<link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}"> -->
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
<div class="container">
    <div class="row contenedor d-flex justify-content-around">
    @foreach ($carnets as $carnet)
            <div class="col-5 cajaRol pl-1 pr-1 mb-5 mt-5">
                <div class="card">
                    <div class="card-modelo">
                        <div class="bordeCarnet m-2 rounded" style="border: 1px black solid;background-color: {{$carnet->marco5}}">
                            <div class="foto pt-3 pl-3 pr-3 pb-0 m-3" style="background: linear-gradient(180deg, {{$carnet->marco1}} 0%, {{$carnet->marco2}} 15%, {{$carnet->marco3}} 30%, {{$carnet->marco4}} 45%, {{$carnet->marco5}} 60%, {{$carnet->marco5}} 100%);">
                                <img src="{{asset('imagenes/usuarios/prueba.jpg')}}" class="img-fluid" alt="...">
                            </div>
                            <div class="rolUsuario text-capitalize d-flex justify-content-center"><strong>{{$carnet->rol->nombre}}</strong></div>
                            <div class="nombreUsuario mt-1 fs-5 d-flex justify-content-center"><strong>Ana M. Rodriguez</strong></div>
                            <div class="codigoQR d-flex justify-content-center mt-2 mb-3">
                                {!! QrCode::size(100)->generate('Codigo Qr de prueba'); !!}
                            </div>
                            <div class="facultad row mb-4 m-3" style="background-color: {{$carnet->label1}};color:white; border-radius: 5px">
                                <div class="col-12 text-center text-wrap"><h5><strong>Facultad de Ingenierias</strong></h5></div>
                                <div class="col-12 text-center"><h6>Ingenieria Industrial</h6></div>
                            </div>
                            <div class="valido d-flex justify-content-center mb-2"><strong style="font-weight: bold; font-size: 0.8em;">Valido hasta 2022-12-31</strong></div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center">
                      <h5 class="card-title">Tipo de usuario: {{$carnet->rol->nombre}}</h5>
                      <p class="card-text"></p>
                      <a href="{{ route('admin-parametros-canets-configurar', ['id' => $carnet->id]) }}" class="btn btn-primary">Configurar</a>
                    </div>
                  </div>
            </div>
    @endforeach
    </div>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')

@endsection
