@extends("theme.back.plantilla")
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
Dominios de correos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
<div class="card">
    @include('includes.error-form')
    @include('includes.mensaje')
    <div class="card-header">
        <div class="row mb-3">
            <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                <h5>Listado de dominios de correos</h5>
            </div>
            <div class="col-12 col-md-6 pr-5">
                <a href="{{ route('dominios-create') }}" class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end" style="max-width: 150px">
                    <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                </a>
            </div>
        </div>
    </div>
    <div class="card-body pb-3">
        <div class="container-fluid">
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm tabla-borrando nowrap tabla_data_table" id="tablaEquipos">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center" style="white-space:nowrap;">Id</th>
                                <th class="text-center" style="white-space:nowrap;">Dominio</th>
                                <th class="text-center" style="white-space:nowrap;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dominios as $dominio)
                            <tr>
                                <td>{{$dominio->id}}</td>
                                <td>{{$dominio->dominio??'---'}}</td>

                                <td>
                                    <a href="{{ route('admin-dominios-editar', ['id' => $dominio->id]) }}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <form action="{{ route('admin-dominios-eliminar', ['id' => $dominio->id]) }}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
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
<!-- <script src="{{ asset('js/intranet/empresa/equipos/equipos.js') }}"></script> -->
@endsection
<!-- ************************************************************* -->