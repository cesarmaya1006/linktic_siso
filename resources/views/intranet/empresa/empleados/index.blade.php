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
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de empleados</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a href="{{ route('empleados-crear') }}" class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end"
                        style="max-width: 150px">
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
                                    <th class="text-center" style="white-space:nowrap;">Estado</th>
                                    <th class="text-center" style="white-space:nowrap;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{$empleado->id}}</td>
                                    <td>{{$empleado->empresa->empresa??'---'}}</td>
                                    <td>{{$empleado->usuario}}</td>
                                    <td>{{$empleado->cargo}}</td>
                                    <td>{{$empleado->cedula?? '---'}}</td>
                                    <td class="text-center">{{$empleado->telefono?? '---'}}</td>
                                    <td>{{$empleado->gestion->gestion?? '---'}}</td>
                                    <td>{{$empleado->contrato->tipo?? '---'}}</td>
                                    <td class="text-center">{{$empleado->ticket?? '---'}}</td>
                                    <td class="text-center">{{$empleado->centro->centro?? '---'}}</td>
                                    <td class="text-center">{{$empleado->fecha_retiro?? '---'}}</td>
                                    <td class="text-center">{{$empleado->estado}}</td>
                                    <td class=" pl-3 pr-3" style="white-space:nowrap;">
                                        <a href="{{ route('empleados-editar', ['id' => $empleado->id]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <a class="text-warning ml-3 mr-3" href="{{ route('empleados-retirar', ['id' => $empleado->id]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Retirar">
                                            <i class="fas fa-user-alt-slash"></i>
                                        </a>
                                        <form action="{{ route('empleados-eliminar', ['id' => $empleado->id]) }}"
                                            class="d-inline form-eliminar" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                title="Eliminar este registro">
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
