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
    Matríz de Cuentas Corporativas
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Matríz de Cuentas Corporativas</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">

                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    <div class="col-10 col-md-7 table-responsive">
                        @csrf
                        <table class="table table-striped table-hover table-sm tabla-borrando nowrap"
                            id="tabla-data">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center">Cargos</th>
                                    @foreach ($cuentas as $cuenta)
                                        <th class="text-center">{{ $cuenta->cuenta }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargos as $cargo)
                                    <tr>
                                        <td class="text-center">{{ $cargo['cargo'] }}</td>
                                        @foreach ($cuentas as $id => $cuenta)
                                            <td class="text-center">
                                                <input type="checkbox" class="cuenta_cargo" name="cuenta_cargo[]"
                                                    data-cuentaid={{ $cuenta['id'] }} value="{{ $id }}"
                                                    @if ($cargo->matriz_cuentas_corporativas->where('cuenta_corporativa_id',$cuenta->id)->where('matriz_cargo_id',$cargo->id)->count()>0)
                                                    checked
                                                    onclick="des_asignacion('{{route('matriz_cuentas_corporativas_desasignacion',['matriz_cargo_id' => $cargo->id,'cuenta_corporativa_id' => $cuenta->id])}}')"
                                                    @else
                                                    onclick="asignacion('{{route('matriz_cuentas_corporativas_asignacion',['matriz_cargo_id' => $cargo->id,'cuenta_corporativa_id' => $cuenta->id])}}')"
                                                    @endif
                                                    >
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <script src="{{ asset('js/intranet/empresa/matriz_cuentas_corporativas/matriz_cuentas_corporativas.js') }}"></script>
@endsection
<!-- ************************************************************* -->
