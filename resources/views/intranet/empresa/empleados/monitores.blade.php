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
                    <h5>Empleados - Asignación de monitores</h5>
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
                                    <th style="white-space:nowrap;">Nombre</th>
                                    <th style="white-space:nowrap;">Entidad</th>
                                    <th style="white-space:nowrap;">Estado</th>
                                    <th style="white-space:nowrap;">Fabricantes</th>
                                    <th style="white-space:nowrap;">Número de serie</th>
                                    <th style="white-space:nowrap;">Localizaciones</th>
                                    <th style="white-space:nowrap;">Tipo</th>
                                    <th style="white-space:nowrap;">Modelo</th>
                                    <th style="white-space:nowrap;">Usuario</th>
                                    <th style="white-space:nowrap;">Última Actualización</th>
                                    <th style="white-space:nowrap;">Comentarios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($monitores as $monitor)
                                <tr id="tr_{{$monitor->id}}">
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                onclick="asignacion_imp('{{route('monitores_asignacion',['empleado_id' => $empleado->id,'glpi_monitors_id' => $monitor->id])}}','{{$monitor->id}}')">
                                          </div>
                                    </td>
                                    <td>{{$monitor->name}}</td>
                                    <td>{{$monitor->entidad->completename}}</td>
                                    <td>{{$monitor->estado->name?? ''}}</td>
                                    <td>{{$monitor->fabricante->name?? ''}}</td>
                                    <td>{{$monitor->serial}}</td>
                                    <td>{{$monitor->locacion->name?? ''}}</td>
                                    <td>{{$monitor->tipoMonitor->name?? ''}}</td>
                                    <td>{{$monitor->modeloMonitor->name?? ''}}</td>
                                    <td>{{$monitor->usuario->firstname?? ''}} {{$monitor->usuario->realname?? ''}}</td>
                                    <td>{{$monitor->date_mod}}</td>
                                    <td>{{$monitor->comment??'---'}}</td>
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

<script src="{{ asset('js/intranet/empresa/empleados/asignacion_monitores.js') }}"></script>
@endsection
<!-- ************************************************************* -->
