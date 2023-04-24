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
    Retiros Empleados
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de empleados retirados</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">

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
                                    <th class="text-center" style="white-space:nowrap;">Empresa</th>
                                    <th class="text-center" style="white-space:nowrap;">Usuario</th>
                                    <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                    <th class="text-center" style="white-space:nowrap;">Cédula</th>
                                    <th class="text-center" style="white-space:nowrap;">Teléfono</th>
                                    <th class="text-center" style="white-space:nowrap;">Gestión</th>
                                    <th class="text-center" style="white-space:nowrap;">Tipo Contrato</th>
                                    <th class="text-center" style="white-space:nowrap;">Ticket de Contratación</th>
                                    <th class="text-center" style="white-space:nowrap;">Centro de Cosotos</th>
                                    <th class="text-center" style="white-space:nowrap;">Fecha de retiro</th>
                                    <th class="text-center" style="white-space:nowrap;">Observaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{$empleado->id}}</td>
                                    <td>{{$empleado->empresa??'---'}}</td>
                                    <td>{{$empleado->usuario}}</td>
                                    <td>{{$empleado->cargo}}</td>
                                    <td>{{$empleado->cedula?? '---'}}</td>
                                    <td class="text-center">{{$empleado->telefono?? '---'}}</td>
                                    <td>{{$empleado->gestion?? '---'}}</td>
                                    <td>{{$empleado->contrato?? '---'}}</td>
                                    <td class="text-center">{{$empleado->ticket?? '---'}}</td>
                                    <td class="text-center">{{$empleado->centro_costos?? '---'}}</td>
                                    <td class="text-center">{{$empleado->fecha_retiro?? '---'}}</td>
                                    <td class="text-center">{{$empleado->observaciones?? '---'}}</td>
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

@endsection
<!-- ************************************************************* -->
