@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/intranet/empresa/caracteristicas/crear.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Editar Caracteristicas
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('cuerpo_pagina')
    <div class="card">
        {{ $mensaje ?? '' }}
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <h3 class="card-title">Edición Característica</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


        <div class="card-body">
            <form action="{{ route('empleados-actualizar', ['id' => $empleado->id]) }}" class="form-horizontal" method="POST">
                @csrf
                @method('put')
                @include('intranet.empresa.empleados.form')
            </form>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h5><strong>Cuentas Corporativas</strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($cuentas as $cuenta)
                        <div class="form-check  mr-2">
                            <input
                                class="form-check-input checkbox_cuentas"
                                type="checkbox"
                                @foreach ($empleado->cuentas_empleados as $item)
                                    @if ($item->cuenta_corporativa_id ==$cuenta->id )
                                    checked
                                    @endif
                                @endforeach
                                value="{{$cuenta->id}}"
                                id="cuenta_"{{$cuenta->id}}
                                data_url="{{route('admin-cuentas_corporativas-asignar',['empleado_id'=>$empleado->id,'cuenta_corporativa_id'=>$cuenta->id])}}">
                            <label class="form-check-label" for="flexCheckDefault">
                            {{$cuenta->cuenta}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h5><strong>Licencias</strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($licencias as $licencia)
                        <div class="form-check  mr-2">
                            <input
                                class="form-check-input checkbox_licencias"
                                type="checkbox"
                                @foreach ($empleado->licencias_empleado as $item)
                                    @if ($item->licencia_id ==$licencia->id )
                                    checked
                                    @endif
                                @endforeach
                                value="{{$licencia->id}}"
                                id="licencia_"{{$licencia->id}}
                                data_url="{{route('admin-licencias_corporativas-asignar',['empleado_id'=>$empleado->id,'licencia_id'=>$licencia->id])}}">
                            <label class="form-check-label" for="flexCheckDefault">
                            {{$licencia->licencia}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5><strong>Equipos rentados Asignados</strong></h5>
                </div>
                <div class="col-12">

                </div>
                <div class="col-12 col-md-6">
                    <a hef="{{ route('equipos_rentados_asignar',['id' => $empleado->id]) }}" class="btn btn-info btn-xs bg-gradient btn-sombra float-end pl-4 pr-4">
                        <i class="fa fa-fw fa-plus-circle"></i> Asignar Equipo Rentado en Bodega
                    </a>
                </div>

                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center" style="white-space:nowrap;">Id</th>
                                <th class="text-center" style="white-space:nowrap;">Asignado</th>
                                <th class="text-center" style="white-space:nowrap;">Fecha de Asignación</th>
                                <th class="text-center" style="white-space:nowrap;">Meses de asignación</th>
                                <th class="text-center" style="white-space:nowrap;">Proveedor</th>
                                <th class="text-center" style="white-space:nowrap;">Centro de Costo</th>
                                <th class="text-center" style="white-space:nowrap;">Sub-Centro de Costo</th>
                                <th class="text-center" style="white-space:nowrap;">Tikect</th>
                                <th class="text-center" style="white-space:nowrap;">Responsable</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo de Equipo</th>
                                <th class="text-center" style="white-space:nowrap;">Serial</th>
                                <th class="text-center" style="white-space:nowrap;">Codigo</th>
                                <th class="text-center" style="white-space:nowrap;">Fecha de Entrega Proveedor</th>
                                <th class="text-center" style="white-space:nowrap;">Valor sin IVA</th>
                                <th class="text-center" style="white-space:nowrap;">Estado</th>
                                <th class="text-center" style="white-space:nowrap;">Meses de uso</th>
                                <th class="text-center" style="white-space:nowrap;">Fecha de Devolución</th>
                                <th class="text-center" style="white-space:nowrap;">Observaciones</th>
                                <th class="text-center" style="white-space:nowrap;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleado->equiposrentados as $equipo)
                            <tr>
                                <td>{{$equipo->id}}</td>
                                <td class="text-left">{{$equipo->rentado_estado_id==3? ($equipo->asignaciones->last()->asignado->asignado?? '---'):'---'}}</td>
                                <td class="text-center">{{$equipo->rentado_estado_id==3? ($equipo->fecha_asignacion?? '---'):'---'}}</td>
                                <td class="text-center">{{$equipo->rentado_estado_id==3? ($equipo->meses_uso_renta?? '---'):'---'}}</td>
                                <td class="text-left">{{$equipo->proveedor->proveedor}}</td>
                                <td class="text-left">{{$equipo->centro_costo->proyecto}}</td>
                                <td class="text-left">{{$equipo->sub_centro_costo->centro??''}}</td>
                                <td class="text-center">{{$equipo->tiket}}</td>
                                <td class="text-left">{{$equipo->responsable->responsable}}</td>
                                <td class="text-center">{{$equipo->tipo->tipo}}</td>
                                <td class="text-center">{{$equipo->serial}}</td>
                                <td class="text-center">{{$equipo->codigo}}</td>
                                <td class="text-center">{{$equipo->fecha_entrega}}</td>
                                <td class="text-right">$ {{ number_format($equipo->valor,2,'.',',')}}</td>
                                <td class="text-center">{{ $equipo->rentado_estado_id===2? 'Devuelto al proveedor' : $equipo->estado->estado}}</td>
                                <td class="text-center">{{$equipo->meses_uso}}</td>
                                <td class="text-center">{{$equipo->fecha_devolucion??'---'}}</td>
                                <td class="text-left">{{$equipo->observaciones??''}}</td>
                                <td class="text-center">
                                    @if ($equipo->rentado_estado_id !=2)
                                    <a href="{{ route('admin-equipos_rentados-editar', ['id' => $equipo->id]) }}"
                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <form action="{{ route('admin-equipos_rentados-eliminar', ['id' => $equipo->id]) }}"
                                        class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                            title="Eliminar este registro">
                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @if ($empleado->equiposrentados)

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer -->

    </div>
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/empleados/editar.js') }}"></script>
@endsection
<!-- ************************************************************* -->
