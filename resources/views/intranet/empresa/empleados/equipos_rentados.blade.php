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
    Empleados
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @csrf
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Empleados - Asignación de equipos rentados</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a  href="{{ route('empleados-editar', ['id' => $empleado->id]) }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3 float-sm-right"
                        style="font-size: 0.9em;">
                        <i class="fas fa-reply mr-2"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Asignar</th>
                                    <th class="text-center" style="white-space:nowrap;">Id</th>
                                    <th class="text-center" style="white-space:nowrap;">Proveedor</th>
                                    <th class="text-center" style="white-space:nowrap;">Centro de Costo</th>
                                    <th class="text-center" style="white-space:nowrap;">Sub-Centro de Costo</th>
                                    <th class="text-center" style="white-space:nowrap;">Responsable</th>
                                    <th class="text-center" style="white-space:nowrap;">Tipo de Equipo</th>
                                    <th class="text-center" style="white-space:nowrap;">Serial</th>
                                    <th class="text-center" style="white-space:nowrap;">Codigo</th>
                                    <th class="text-center" style="white-space:nowrap;">Tiket</th>
                                    <th class="text-center" style="white-space:nowrap;">Valor sin IVA</th>
                                    <th class="text-center" style="white-space:nowrap;">Observaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipos as $equipo)
                                <tr id="tr_{{$equipo->id}}">
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                onclick="asignacion('{{route('equipos_rentados_asignacion',['empleado_id' => $empleado->id,'equipo_rentado_id' => $equipo->id])}}','{{$equipo->id}}')">
                                          </div>
                                    </td>
                                    <td class="text-center">{{$equipo->id}}</td>
                                    <td class="text-left">{{$equipo->proveedor->proveedor}}</td>
                                    <td class="text-left">{{$equipo->centro_costo->proyecto}}</td>
                                    <td class="text-left">{{$equipo->sub_centro_costo->centro??''}}</td>
                                    <td class="text-left">{{$equipo->responsable->responsable}}</td>
                                    <td class="text-center">{{$equipo->tipo->tipo}}</td>
                                    <td class="text-center">{{$equipo->serial}}</td>
                                    <td class="text-cen ter">{{$equipo->codigo}}</td>
                                    <td class="text-center">{{$equipo->tiket}}</td>
                                    <td class="text-right">$ {{ number_format($equipo->valor,2,'.',',')}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-12">
                                                <p style="text-align: justify">{{$equipo->observaciones}}</p>
                                            </div>
                                        </div>
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
<script src="{{ asset('js/intranet/empresa/empleados/asignacion_equipo.js') }}"></script>
@endsection
<!-- ************************************************************* -->
