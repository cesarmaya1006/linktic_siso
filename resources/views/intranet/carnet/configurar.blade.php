@php
    function rgba2hex($string) {
        $string =  trim($string);
        $string = str_replace("rgb(", "", $string);
        $string = str_replace(")", "", $string);
        $string = str_replace(" ", "", $string);
        $string =  trim($string);
        $rgba = explode(',', $string);
        $iRed   = (int) $rgba[0];
        $iGreen = (int) $rgba[1];
        $iBlue  = (int) $rgba[2];


        $sHexValue = '';
        if ($iRed == 0) {
            $sHexValue .='00';
        } else {

            if ($iRed < 10 || strlen(dechex($iRed)) < 2) {
                $sHexValue .='0'.dechex($iRed);
            } else {
                $sHexValue .=dechex($iRed);
            }
        }
        if ($iGreen == 0) {
            $sHexValue .='00';
        } else {
            if ($iGreen < 10 || strlen(strval(dechex($iGreen))) < 2) {
                $sHexValue .='0'.dechex($iGreen);
            } else {
                $sHexValue .=dechex($iGreen);
            }
        }
        if ($iBlue == 0) {
            $sHexValue .='00';
        } else {
            if ($iBlue < 10 || strlen(strval(dechex($iBlue))) < 2) {
                $sHexValue .='0'.dechex($iBlue);
            } else {
                $sHexValue .=dechex($iBlue);
            }
        }

        return strtoupper("#".$sHexValue);
    }
@endphp
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
                    </div>
                  </div>
            </div>
            <div class="col-5">
                @include('includes.error-form')
                @include('includes.mensaje')
                <form action="{{ route('admin-parametros-canets-configurar-actualizar', ['id' => $carnet->id]) }}"
                    class="form-horizontal row" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="marco1">Color del marco 1</label>
                            <input type="color" class="form-control" name="marco1" id="marco1" aria-describedby="helpId"
                                value="{{ old('marco1', rgba2hex($carnet->marco1) ?? '') }}" placeholder="Color marco 1" required>
                            <small id="helpId" class="form-text text-muted">Color 1</small>
                        </div>
                        <div class="form-group">
                            <label for="marco2">Color del marco 2</label>
                            <input type="color" class="form-control" name="marco2" id="marco2" aria-describedby="helpId"
                                value="{{ old('marco2', rgba2hex($carnet->marco2) ?? '') }}" placeholder="Color marco 2" required>
                            <small id="helpId" class="form-text text-muted">Color 2</small>
                        </div>
                        <div class="form-group">
                            <label for="marco3">Color del marco 3</label>
                            <input type="color" class="form-control" name="marco3" id="marco3" aria-describedby="helpId"
                                value="{{ old('marco3', rgba2hex($carnet->marco3) ?? '') }}" placeholder="Color marco 3" required>
                            <small id="helpId" class="form-text text-muted">Color 3</small>
                        </div>
                        <div class="form-group">
                            <label for="marco4">Color del marco 4</label>
                            <input type="color" class="form-control" name="marco4" id="marco4" aria-describedby="helpId"
                                value="{{ old('marco4', rgba2hex($carnet->marco4) ?? '') }}" placeholder="Color marco 4" required>
                            <small id="helpId" class="form-text text-muted">Color 4</small>
                        </div>
                        <div class="form-group">
                            <label for="marco5">Color del Fondo</label>
                            <input type="color" class="form-control" name="marco5" id="marco5" aria-describedby="helpId"
                                value="{{ old('marco5', rgba2hex($carnet->marco5) ?? '') }}" placeholder="Color marco 5" required>
                            <small id="helpId" class="form-text text-muted">Color 5</small>
                        </div>
                        <div class="form-group">
                            <label for="label1">Color de Identificación de facultad</label>
                            <input type="color" class="form-control" name="label1" id="label1" aria-describedby="helpId"
                                value="{{ old('label1', rgba2hex($carnet->label1) ?? '') }}" placeholder="Color Facultad" required>
                            <small id="helpId" class="form-text text-muted">Color Facultad</small>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-sm btn-sombra pl-4 pr-4">Actualizar</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
    </div>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')

@endsection
