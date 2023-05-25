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
    Dominios go daddy
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de Pagos Dominios plataforma go daddy</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a href="{{ route('dominiosDaddy-create') }}" class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end"
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
                        <table class="table table-striped table-hover table-sm tabla-borrando nowrap" id="tabla_correos">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center" style="white-space:nowrap;">Id</th>
                                    <th class="text-center" style="white-space:nowrap;"> Nombre del dominio </th>
                                    <th class="text-center" style="white-space:nowrap;"> Ticket de renovacion </th>
                                    <th class="text-center" style="white-space:nowrap;">Fecha de vencimiento</th>
                                    <th class="text-center" style="white-space:nowrap;">Renovacion</th>
                        
                                    <th class="text-center" style="white-space:nowrap;">Centro de costos</th>
                                    <th class="text-center" style="white-space:nowrap;">Empleados</th>
                                    <th class="text-center" style="white-space:nowrap;"> Factura </th>
                                    <th class="text-center" style="white-space:nowrap;"> Valor  </th>
                                    <th class="text-center" style="white-space:nowrap;">Tarjeta</th>
                                    <th class="text-center" style="white-space:nowrap;">Opciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dominios as $dominio )
                                <tr>
                                    <td>{{$dominio->id}}</td>
                                    <td>{{$dominio->cuenta??'---'}}</td>
                                    <td>{{$dominio->ticket_renovacion??'---'}}</td>
                                    <td>{{$dominio->fecha_de_vencimiento??'---'}}</td>
                                    <td>{{$dominio->renovacion??'---'}}</td>
                                    <td>{{$dominio->centro->proyecto??'---'}}</td> 
                                    <td class="text-center">{{$dominio->usuario->usuario??'---'}}</td>
                                    <td>{{$dominio->factura??'---'}}</td>
                                    <td class="text-center">${{$dominio->valor?? '---'}}</td> 
                                    <td class="text-center">{{$dominio->tarjeta?? '---'}}</td> 

                                    <td class=" pl-3 pr-3" style="white-space:nowrap;">
                                        <a href="{{route('admin-dominiosDaddy-editar', ['id' => $dominio->id]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                       
                                        <form action="{{ route('admin-dominiosDaddy-eliminar', ['id' => $dominio->id]) }}"
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
<script src="{{ asset('js/intranet/empresa/correos/correos.js') }}"></script>
@endsection
<!-- ************************************************************* -->
