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
            <div class="row">
                <div class="col-12 col-md-6">
                    @if ($primer_id !=$empleado->id)
                    <a href="{{ route('empleados-editar', ['id' => ($id_anterior)]) }}" class="btn btn-info btn-sombra btn-xs pl-5 pr-5 pt-1 pb-1"><i class="fas fa-reply mr-2" aria-hidden="true"></i> Anterior</a>
                    @endif
                </div>
                <div class="col-12 col-md-6 text-end">
                    @if ($ultimo_id != $empleado->id)
                    <a href="{{ route('empleados-editar', ['id' => ($id_siguiente)]) }}" class="btn btn-info btn-sombra btn-xs pl-5 pr-5 pt-1 pb-1">Siguiente <i class="fas fa-share ml-2" aria-hidden="true"></i></a>
                    @endif
                </div>
            </div>
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
                            <label class="form-check-label text-uppercase" for="flexCheckDefault">
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
                            <label class="form-check-label text-uppercase" for="flexCheckDefault">
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
                <div class="col-12 col-md-6">
                    <a href="{{ route('equipos_rentados_asignar',['id' => $empleado->id]) }}" class="btn btn-info btn-xs bg-gradient btn-sombra float-end pl-4 pr-4">
                        <i class="fa fa-fw fa-plus-circle"></i> Asignar Equipo Rentado en Bodega
                    </a>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Quitar Asignación</th>
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
                            @foreach ($empleado->equiposrentados as $equipo)
                            <tr id="tr_{{$equipo->id}}">
                                <td>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            onclick="des_asignacion('{{route('equipos_rentados_asignacion',['empleado_id' => $empleado->id,'equipo_rentado_id' => $equipo->id])}}','{{$equipo->id}}')"
                                            checked>
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
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5><strong>Equipos propios Asignados</strong></h5>
                </div>
                <div class="col-12 col-md-6">
                    <a href="{{ route('equipos_propios_asignar',['id' => $empleado->id]) }}" class="btn btn-info btn-xs bg-gradient btn-sombra float-end pl-4 pr-4">
                        <i class="fa fa-fw fa-plus-circle"></i> Asignar Equipo Propio
                    </a>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Quitar Asignación</th>
                                <th class="text-center" style="white-space:nowrap;">Asigando</th>
                                <th class="text-center" style="white-space:nowrap;">Estado</th>
                                <th class="text-center" style="white-space:nowrap;">Fabricante</th>
                                <th class="text-center" style="white-space:nowrap;">Número de serie</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo</th>
                                <th class="text-center" style="white-space:nowrap;">Modelo</th>
                                <th class="text-center" style="white-space:nowrap;">Sistema operativo - Nombre</th>
                                <th class="text-center" style="white-space:nowrap;">Localización</th>
                                <th class="text-center" style="white-space:nowrap;">Componentes - Procesador</th>
                                <th class="text-center" style="white-space:nowrap;">Volumenes - Tamaño global</th>
                                <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                <th class="text-center" style="white-space:nowrap;">Componentes - Memoria</th>
                                <th class="text-center" style="white-space:nowrap;">Fecha de compra</th>
                                <th class="text-center" style="white-space:nowrap;">Meses en Uso</th>
                                <th class="text-center" style="white-space:nowrap;">Porcentaje de uso </th>
                                <th class="text-center" style="white-space:nowrap;">Centro de Costos</th>
                                <th class="text-center" style="white-space:nowrap;">Proveedor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos_propios as $equipo)
                            <tr id="tr2_{{$equipo->id}}">
                                <td>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            onclick="des_asignacion_2('{{route('equipos_propios_asignacion',['empleado_id' => $empleado->id,'glpi_computers_id' => $equipo->id])}}','{{$equipo->id}}')"
                                            checked>
                                      </div>
                                </td>
                                <td>{{$equipo->usuario->firstname?? ''}} {{$equipo->usuario->realname?? 'Sin Asignar'}}</td>
                                <td class="text-center">{{$equipo->estado->name?? '---'}}</td>
                                <td>{{$equipo->fabricante->name?? ''}}</td>
                                <td>{{$equipo->serial}}</td>
                                <td>{{$equipo->tipoComputador->name?? ''}}</td>
                                <td>{{$equipo->modeloComputador->name?? ''}}</td>
                                <td>{{$equipo->sistemaOp->name?? ''}}</td>
                                <td>{{$equipo->locacion->name?? ''}}</td>
                                <td>{{$equipo->procesadores[0]->designation?? ''}}</td>
                                <td>@foreach ($equipo->itemsdevicedrives as $item)
                                    <p>{{number_format(($item->capacity)/1000,2).' GB'}}</p>
                                    @endforeach</td>
                                <td>{{$equipo->grupo->completename?? ''}}</td>
                                <td>@foreach ($equipo->itemsdevicememories as $item)
                                    <p>{{number_format(($item->size)/1000,0).' GB'}}</p>
                                    @endforeach</td>
                                <td>{{$equipo->fec_compra?? ''}}</td>
                                <td>{{$equipo->meses_uso?? ''}} Meses
                                    @php
                                    $barras = '';
                                    if ($equipo->porcentaje<=50) {
                                        $barras .='<div class="progress-bar bg-success" role="progressbar" style="width: '.$equipo->porcentaje.'%" aria-valuenow="'.$equipo->porcentaje.'" aria-valuemin="0" aria-valuemax="100"></div>';
                                    } else {
                                        $barras .='<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';
                                        if ($equipo->porcentaje<=65) {
                                            $barras .='<div class="progress-bar" role="progressbar" style="width: '.(50 - $equipo->porcentaje).'%" aria-valuenow="'.(50 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                        } else {
                                            $barras .='<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>';
                                            if ($equipo->porcentaje<=75) {
                                                $barras .='<div class="progress-bar bg-info" role="progressbar" style="width: '.(65 - $equipo->porcentaje).'%" aria-valuenow="'.(65 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                            } else {
                                                $barras .='<div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
                                                if ($equipo->porcentaje<=85) {
                                                    $barras .='<div class="progress-bar bg-warning" role="progressbar" style="width: '.(75 - $equipo->porcentaje).'%" aria-valuenow="'.(75 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                                } else {
                                                    $barras .='<div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
                                                    if ($equipo->porcentaje<=100) {
                                                        $barras .='<div class="progress-bar bg-danger" role="progressbar" style="width: '.(85 - $equipo->porcentaje).'%" aria-valuenow="'.(85 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                                    } else {
                                                        $barras .='<div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    @endphp
                                    <div class="progress">
                                        {!!$barras!!}
                                      </div></td>
                                <td class="text-right">{{$equipo->porcentaje?? ''}} %</td>
                                <td>{{$equipo->centro_costo??'---'}}</td>
                                <td>{{$equipo->proveedor??'---'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5><strong>Impresoras Asignadas</strong></h5>
                </div>
                <div class="col-12 col-md-6">
                    <a href="{{ route('impresoras_asignar',['id' => $empleado->id]) }}" class="btn btn-info btn-xs bg-gradient btn-sombra float-end pl-4 pr-4">
                        <i class="fa fa-fw fa-plus-circle"></i> Asignar Impresora
                    </a>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Quitar Asignación</th>
                                <th style="white-space:nowrap;">Nombre</th>
                                <th style="white-space:nowrap;">Usuario</th>
                                <th style="white-space:nowrap;">Grupos</th>
                                <th style="white-space:nowrap;">Estado</th>
                                <th style="white-space:nowrap;">Número de serie</th>
                                <th style="white-space:nowrap;">Fabricantes</th>
                                <th style="white-space:nowrap;">Localizaciones</th>
                                <th style="white-space:nowrap;">Tipo</th>
                                <th style="white-space:nowrap;">Modelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($impresoras as $impresora)
                            <tr id="tr2_{{$impresora->id}}">
                                <td>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            onclick="des_asignacion_imp('{{route('impresoras_asignacion',['empleado_id' => $empleado->id,'glpi_printers_id' => $impresora->id])}}','{{$impresora->id}}')"
                                            checked>
                                      </div>
                                </td>
                                <td>{{$impresora->name}}</td>
                                <td>{{$impresora->usuario->firstname?? ''}} {{$impresora->usuario->realname?? ''}}</td>
                                <td>{{$impresora->grupo->completename?? ''}}</td>
                                <td>{{$impresora->estado->name?? ''}}</td>
                                <td>{{$impresora->serial}}</td>
                                <td>{{$impresora->fabricante->name?? ''}}</td>
                                <td>{{$impresora->locacion->name?? ''}}</td>
                                <td>{{$impresora->tipoImpresora->name?? ''}}</td>
                                <td>{{$impresora->modeloImpresora->name?? ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5><strong>Monitores Asignados</strong></h5>
                </div>
                <div class="col-12 col-md-6">
                    <a href="{{ route('monitores_asignar',['id' => $empleado->id]) }}" class="btn btn-info btn-xs bg-gradient btn-sombra float-end pl-4 pr-4">
                        <i class="fa fa-fw fa-plus-circle"></i> Asignar Monitor
                    </a>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Quitar Asignación</th>
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
                            <tr id="tr2_{{$monitor->id}}">
                                <td>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            onclick="des_asignacion_imp('{{route('monitores_asignacion',['empleado_id' => $empleado->id,'glpi_monitors_id' => $monitor->id])}}','{{$monitor->id}}')"
                                            checked>
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
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5><strong>Otros Elementos Asignados</strong></h5>
                </div>
                <div class="col-12 col-md-6">
                    <a href="{{ route('otros_asignar',['id' => $empleado->id]) }}" class="btn btn-info btn-xs bg-gradient btn-sombra float-end pl-4 pr-4">
                        <i class="fa fa-fw fa-plus-circle"></i> Asignar Otro Elemento
                    </a>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Quitar Asignación</th>
                                <th style="white-space:nowrap;">ID</th>
                                <th style="white-space:nowrap;">Nombre Elemento</th>
                                <th style="white-space:nowrap;">Entidad</th>
                                <th style="white-space:nowrap;">Estado</th>
                                <th style="white-space:nowrap;">Fabricante</th>
                                <th style="white-space:nowrap;">N° de Serie</th>
                                <th style="white-space:nowrap;">Localización</th>
                                <th style="white-space:nowrap;">Tipo</th>
                                <th style="white-space:nowrap;">Modelo</th>
                                <th style="white-space:nowrap;">Comentarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($otros as $elemento)
                            <tr id="tr2_{{$elemento->id}}">
                                <td>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            onclick="des_asignacion_otro('{{route('otros_asignacion',['id' => $elemento->id])}}','{{$elemento->id}}')"
                                            checked>
                                      </div>
                                </td>
                                <td>{{$elemento->id}}</td>
                                <td>{{$elemento->elemento}}</td>
                                <td>{{$elemento->entidad}}</td>
                                <td>{{$elemento->estado_siso->estado}}</td>
                                <td>{{$elemento->fabricante}}</td>
                                <td>{{$elemento->num_serie}}</td>
                                <td>{{$elemento->localizacion}}</td>
                                <td>{{$elemento->tipo}}</td>
                                <td>{{$elemento->modelo}}</td>
                                <td>{{$elemento->comentario}}</td>
                            </tr>
                            @endforeach
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
    <script src="{{ asset('js/intranet/empresa/empleados/asignacion_equipo.js') }}"></script>
    <script src="{{ asset('js/intranet/empresa/empleados/asignacion_impresoras.js') }}"></script>
    <script src="{{ asset('js/intranet/empresa/empleados/asignacion_otros.js') }}"></script>
@endsection
<!-- ************************************************************* -->
