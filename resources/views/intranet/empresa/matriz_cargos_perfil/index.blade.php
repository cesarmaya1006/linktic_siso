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
    Matríz de Cargos Perfiles
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Matríz de Cargos Perfiles</h5>
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
                        <table class="table table-striped table-hover table-sm tabla-borrando nowrap tabla_data_table"
                            id="tabla-data">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center">Cargos</th>
                                    @foreach ($perfiles as $perfil)
                                        <th class="text-center">{{ $perfil->perfil }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargos as $cargo)
                                    <tr>
                                        <td class="text-center">{{ $cargo['cargo'] }}</td>
                                        @foreach ($perfiles as $id => $perfil)
                                            <td class="text-center">
                                                <input type="checkbox" class="perfil_cargo" name="perfil_cargo[]"
                                                    data-perfilid={{ $perfil['id'] }} value="{{ $id }}"
                                                    @if ($cargo->matriz_perfil->where('matriz_perfi_id',$perfil->id)->where('matriz_cargo_id',$cargo->id)->count()>0)
                                                    checked
                                                    onclick="des_asignacion('{{route('matriz_cargos_perfiles_desasignacion',['matriz_cargo_id' => $cargo->id,'matriz_perfi_id' => $perfil->id])}}')"
                                                    @else
                                                    onclick="asignacion('{{route('matriz_cargos_perfiles_asignacion',['matriz_cargo_id' => $cargo->id,'matriz_perfi_id' => $perfil->id])}}')"
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
    <script src="{{ asset('js/intranet/empresa/matriz_cargos_perfiles/matriz_cargos_perfiless.js') }}"></script>
@endsection
<!-- ************************************************************* -->
