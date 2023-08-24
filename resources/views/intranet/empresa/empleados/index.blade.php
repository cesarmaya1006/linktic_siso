@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">
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
                    @if ($permiso == null || $permiso->guardar)
                        <a href="{{ route('empleados-crear') }}"
                            class="btn btn-block btn-info btn-xs bg-gradient btn-sombra float-end" style="max-width: 150px">
                            <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row  d-flex justify-content-around">
                    @if ($permiso == null || $permiso->listar)
                        <div class="col-12 table-responsive">
                            <table class="table table-striped table-hover table-sm tabla-borrando nowrap tabla_data_table_empleados"
                                id="tablaEquipos">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th></th>
                                        <th class="text-center" style="white-space:nowrap;">Id</th>
                                        <th class="text-center" style="white-space:nowrap;">Empresa</th>
                                        <th class="text-center" style="white-space:nowrap;">Usuario</th>
                                        <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                        <th class="text-center" style="white-space:nowrap;">Cédula</th>
                                        <th class="text-center" style="white-space:nowrap;">Teléfono</th>
                                        <th class="text-center" style="white-space:nowrap;">Gestión</th>
                                        <th class="text-center" style="white-space:nowrap;">Tipo Contrato</th>
                                        <th class="text-center" style="white-space:nowrap;">Ticket de Contratación</th>
                                        <th class="text-center" style="white-space:nowrap;">Centro de Costos</th>
                                        <th class="text-center" style="white-space:nowrap;">Fecha de Retiro</th>
                                        <th class="text-center" style="white-space:nowrap;">Equipos Propios</th>
                                        <th class="text-center" style="white-space:nowrap;">Equipos Rentados</th>
                                        <th class="text-center" style="white-space:nowrap;">Monitores</th>
                                        <th class="text-center" style="white-space:nowrap;">Impresoras</th>
                                        <th class="text-center" style="white-space:nowrap;">Otros Elementos</th>
                                        <th class="text-center" style="white-space:nowrap;">Cuentas Corporativas</th>
                                        <th class="text-center" style="white-space:nowrap;">Licencias corporativas</th>
                                        <th class="text-center" style="white-space:nowrap;">Estado</th>
                                        <th class="text-center" style="white-space:nowrap;">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>
                                                @if ($permiso == null || $permiso->actualizar == 1)
                                                <a class="text-warning ml-3 mr-3"
                                                    href="{{ route('empleados-retirar', ['id' => $empleado->id]) }}"
                                                    class="btn-accion-tabla tooltipsC" title="Retirar">
                                                    <i class="fas fa-user-alt-slash"></i>
                                                </a>
                                            @endif
                                            </td>
                                            <td>{{ $empleado->id }}</td>
                                            <td>{{ $empleado->empresa->empresa ?? '---' }}</td>
                                            <td>
                                                @if ($permiso == null || $permiso->actualizar == 1)
                                                <a href="{{ route('empleados-editar', ['id' => $empleado->id]) }}">
                                                    {{ $empleado->usuario }}
                                                </a>
                                                @else
                                                {{ $empleado->usuario }}
                                                @endif
                                                </td>
                                            <td>{{ $empleado->cargo }}</td>
                                            <td>{{ $empleado->cedula ?? '---' }}</td>
                                            <td class="text-center">{{ $empleado->telefono ?? '---' }}</td>
                                            <td>{{ $empleado->gestion->gestion ?? '---' }}</td>
                                            <td>{{ $empleado->contrato->tipo ?? '---' }}</td>
                                            <td class="text-center">{{ $empleado->ticket ?? '---' }}</td>
                                            <td class="text-center">{{ $empleado->centro->centro ?? '---' }}</td>
                                            <td class="text-center">{{ $empleado->fecha_retiro ?? '---' }}</td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->listar == 1)
                                                    <button data-bs-toggle="modal" data-bs-target="#compPropiosModal"
                                                        class="btn-accion-tabla tooltipsC text-primary verModalEquiposPropios"
                                                        title="Ver Equipos"
                                                        data_url="{{ route('get_equipos_propios', ['id' => $empleado->id]) }}"
                                                        data_empleado="{{ $empleado->usuario }}"
                                                        onclick="verModalEquiposPropiosFunc('{{ route('get_equipos_propios', ['id' => $empleado->id]) }}','{{ $empleado->usuario }}')"
                                                        >
                                                        <i class="fa fa-eye pl-3 pr-3" aria-hidden="true"> Ver</i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->listar == 1)
                                                    <button data-bs-toggle="modal" data-bs-target="#compRentadosModal"
                                                        class="btn-accion-tabla tooltipsC text-primary verModalEquiposRentados"
                                                        title="Ver Equipos"
                                                        data_url="{{ route('get_equipos_rentados', ['id' => $empleado->id]) }}"
                                                        data_empleado="{{ $empleado->usuario }}"
                                                        onclick="verModalEquiposRentadosFunc('{{ route('get_equipos_rentados', ['id' => $empleado->id]) }}','{{ $empleado->usuario }}')"
                                                        >
                                                        <i class="fa fa-eye pl-3 pr-3" aria-hidden="true"> Ver</i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->listar == 1)
                                                    <button data-bs-toggle="modal" data-bs-target="#monitoresModal"
                                                        class="btn-accion-tabla tooltipsC text-primary verModalMonitores"
                                                        title="Ver Monitores"
                                                        data_url="{{ route('get_monitores', ['id' => $empleado->id]) }}"
                                                        data_empleado="{{ $empleado->usuario }}"
                                                        onclick="verModalMonitoresFunc('{{ route('get_monitores', ['id' => $empleado->id]) }}','{{ $empleado->usuario }}')"
                                                        >
                                                        <i class="fa fa-eye pl-3 pr-3" aria-hidden="true"> Ver</i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->listar == 1)
                                                    <button data-bs-toggle="modal" data-bs-target="#impresorasModal"
                                                        class="btn-accion-tabla tooltipsC text-primary verModalImpresoras"
                                                        title="Ver Impresoras"
                                                        data_url="{{ route('get_impresoras', ['id' => $empleado->id]) }}"
                                                        data_empleado="{{ $empleado->usuario }}"
                                                        onclick="verModalImpresorasFunc('{{ route('get_impresoras', ['id' => $empleado->id]) }}','{{ $empleado->usuario }}')"
                                                        >
                                                        <i class="fa fa-eye pl-3 pr-3" aria-hidden="true"> Ver</i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->listar == 1)
                                                    <button data-bs-toggle="modal" data-bs-target="#otrosModal"
                                                        class="btn-accion-tabla tooltipsC text-primary verModalOtros"
                                                        title="Ver Otros Equipos"
                                                        data_url="{{ route('get_otros', ['id' => $empleado->id]) }}"
                                                        data_empleado="{{ $empleado->usuario }}"
                                                        onclick="verModalOtrosFunc('{{ route('get_otros', ['id' => $empleado->id]) }}','{{ $empleado->usuario }}')"
                                                        >
                                                        <i class="fa fa-eye pl-3 pr-3" aria-hidden="true"> Ver</i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->listar == 1)
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#cuentasCorporativasModal"
                                                        class="btn-accion-tabla tooltipsC text-primary verModalCuentasCorporativas"
                                                        title="Ver Cuentas"
                                                        data_url="{{ route('get_cuentas_corporativas', ['id' => $empleado->id]) }}"
                                                        data_empleado="{{ $empleado->usuario }}"
                                                        onclick="verModalCuentasCorporativasFunc('{{ route('get_cuentas_corporativas', ['id' => $empleado->id]) }}','{{ $empleado->usuario }}')"
                                                        >
                                                        <i class="fa fa-eye pl-3 pr-3" aria-hidden="true"> Ver</i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($permiso == null || $permiso->listar == 1)
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#licenciasCorporativasModal"
                                                        class="btn-accion-tabla tooltipsC text-primary verModalLicenciasCorporativas"
                                                        title="Ver Licencias"
                                                        data_url="{{ route('get_licencias_corporativas', ['id' => $empleado->id]) }}"
                                                        data_empleado="{{ $empleado->usuario }}"
                                                        onclick="verModalLicenciasCorporativasFunc('{{ route('get_licencias_corporativas', ['id' => $empleado->id]) }}','{{ $empleado->usuario }}')"
                                                        >
                                                        <i class="fa fa-eye pl-3 pr-3" aria-hidden="true"> Ver</i>
                                                    </button>
                                                @endif

                                            </td>
                                            <td class="text-center">{{ $empleado->estado }}</td>
                                            <td class=" pl-3 pr-3" style="white-space:nowrap;">
                                                @if ($permiso == null || $permiso->borrar == 1)
                                                    <form
                                                        action="{{ route('empleados-eliminar', ['id' => $empleado->id]) }}"
                                                        class="d-inline form-eliminar" method="POST">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                            title="Eliminar este registro">
                                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h3>Aviso del sistema</h3>
                                    </span>
                                    <span class="info-box-text">
                                        <h5>Su rol no tiene permisos de listar en este modulo</h5>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
    <!-- Modales -->
    <!-- ============================================================================== -->
    <!-- Modal Cuentas corporativas -->
    <!-- Modal -->
    <div class="modal fade" id="cuentasCorporativasModal" tabindex="-1" aria-labelledby="cuentasCorporativasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="cuentasCorporativasModalLabel">Cuentas Corporativas Asignadas al Usuario
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyCuentasCorporativas">
                    <div class="row">
                        <div class="col-12">
                            <div class="ul">
                                <li><Strong></Strong></li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
    <!-- Modal Licencias corporativas -->
    <!-- Modal -->
    <div class="modal fade" id="licenciasCorporativasModal" tabindex="-1"
        aria-labelledby="licenciasCorporativasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="licenciasCorporativasModalLabel">Licencias Corporativas Asignadas al
                        Usuario</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyLicenciasCorporativas">
                    <div class="row">
                        <div class="col-12">
                            <div class="ul">
                                <li><Strong></Strong></li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
    <!-- Modal Equipos Rentados -->
    <!-- Modal -->
    <div class="modal fade" id="compRentadosModal" tabindex="-1" aria-labelledby="compRentadosModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="compRentadosModalLabel">Equipos Rentados Asignadas al Usuario</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyEquiposRentados">
                    <div class="row">
                        <div class="col-12">
                            <div class="ul">
                                <li><Strong></Strong></li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
    <!-- Modal Equipos Propios -->
    <!-- Modal -->
    <div class="modal fade" id="compPropiosModal" tabindex="-1" aria-labelledby="compPropiosModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="compPropiosModalLabel">Equipos Propios Asignadas al Usuario</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyEquiposPropios">
                    <div class="row">
                        <div class="col-12">
                            <div class="ul">
                                <li><Strong></Strong></li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
    <!-- Modal Impresoras -->
    <!-- Modal -->
    <div class="modal fade" id="impresorasModal" tabindex="-1" aria-labelledby="impresorasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="impresorasModalLabel">Impresoras Asignadas al Usuario</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyImpresoras">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li><Strong></Strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
    <!-- Modal Monitores -->
    <!-- Modal -->
    <div class="modal fade" id="monitoresModal" tabindex="-1" aria-labelledby="monitoresModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="monitoresModalLabel">Monitores Asignados al Usuario</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyMonitores">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li><Strong></Strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
    <!-- Modal Otros -->
    <!-- Modal -->
    <div class="modal fade" id="otrosModal" tabindex="-1" aria-labelledby="otrosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="otrosModalLabel">Otros Elementos Asignados al Usuario</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyOtros">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li><Strong></Strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================================== -->
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/empleados/empleados.js') }}"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
@endsection
<!-- ************************************************************* -->
