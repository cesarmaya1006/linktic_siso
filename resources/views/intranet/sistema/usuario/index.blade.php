@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <!--<link rel="stylesheet" href="{{ asset('css/admin/usuario.css') }}"> -->
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Usuarios
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- Cuerpo hoja -->
@section('cuerpo_pagina')
    @include('includes.mensaje')
    @include('includes.error-form')
    <div class="cuerpo">
        <div class="box">
            <div class="box-header with-border">
                <div class="row w-100">
                    <div class="col-12 col-md-6">
                        <h3 class="box-title">Listado de Usuarios</h3>
                    </div>
                    <div class="col-12 col-md-6">
                        @if ($permiso == null || $permiso->guardar)
                            <a href="{{ route('admin-usuario-crear') }}"
                                class="btn btn-info btn-xs pl-4 pr-4 btn-sombra float-right ml-5">
                                <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                            </a>
                            <a href="{{ route('usuarios-importar') }}"
                                class="btn btn-warning btn-xs pl-4 pr-4 btn-sombra float-right">Carga Masiva</a>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="box-body  card-primary">
                @foreach ($roles as $rol)
                    <div class="row">
                        @if ($permiso == null || $permiso->listar)
                            <div class="col-6 mt-3 mb-2 mr-5">
                                <h3>{{ $rol->nombre }}s</h3>
                                <p>Cantidad: {{ $rol->usuarios->count() }}</p>
                            </div>
                            <div class="col-12 col-md-11 table-responsive">
                                <table
                                    class="table table-striped table-bordered table-hover tabla_data_table_s tabla-borrando">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center" scope="col">Id</th>
                                            <th class="text-center" scope="col">Usuario</th>
                                            <th class="text-center" scope="col">N. Identificación</th>
                                            <th class="text-center" scope="col">Nombres y Apellidos</th>
                                            <th class="text-center" scope="col">Teléfono</th>
                                            <th class="text-center" scope="col">Dirección</th>
                                            <th class="text-center" scope="col">Email</th>
                                            <th class="text-center" scope="col">Fecha de ingreso</th>
                                            <th class="text-center" scope="col">Estado</th>
                                            <th class="text-center" scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    @if ($rol->usuarios->count())
                                        <tbody id="cuerpo_tabla_usuarios2">
                                            @foreach ($rol->usuarios as $usuario)
                                                <tr>
                                                    <td class="text-center text-nowrap">{{ $usuario->id }}</td>
                                                    <td class="text-center text-nowrap">{{ $usuario->usuario }}</td>
                                                    <td class="text-left text-nowrap">
                                                        {{ $usuario->persona ? $usuario->persona->identificacion : '---' }}
                                                    </td>
                                                    <td class="text-left text-nowrap">
                                                        {{ $usuario->persona ? $usuario->persona->nombre1 . ' ' . $usuario->persona->nombre2 . ' ' . $usuario->persona->apellido1 . ' ' . $usuario->persona->apellido2 : '---' }}
                                                    </td>
                                                    <td class="text-right text-nowrap">
                                                        {{ $usuario->persona ? $usuario->persona->telefono : '---' }}</td>
                                                    <td class="text-left text-nowrap">
                                                        {{ $usuario->persona ? $usuario->persona->direccion : '---' }}</td>
                                                    <td class="text-left text-nowrap">
                                                        {{ $usuario->persona ? $usuario->persona->email : '---' }}</td>
                                                    <td class="text-center text-nowrap">
                                                        {{ $usuario->persona ? $usuario->persona->fecha_inicio : '---' }}</td>
                                                    <td class="text-center text-nowrap">
                                                        {{ $usuario->persona ? ($usuario->persona->estado == 1 ? 'Activo' : 'Inactivo') : '---' }}
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        @if ($permiso == null || $permiso->actualizar == 1)
                                                            @if ($usuario->usuario != 'admin')
                                                                <a href="{{ route('admin-usuario-editar', ['id' => $usuario->id]) }}"
                                                                    class="btn-accion-tabla tooltipsC text-info"
                                                                    title="Editar"><i
                                                                        class="fa fa-edit"aria-hidden="true"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
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
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    <!--  Modal  -->
    <!-- Modal -->
    <div class="modal fade" id="modalCarnet" tabindex="-1" aria-labelledby="modalCarnetLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalCarnetLabel">Carnet : </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" id="modalCuerpo">
                            <div class="bordeCarnet m-2 rounded" style="border: 1px black solid;background-color: 0">
                                <div class="foto pt-3 pl-3 pr-3 pb-0 m-3"
                                    style="background: linear-gradient(180deg, 0 0%, 0 15%, 0 30%,  45%, 0 60%, 0 100%);">
                                    <img src="{{ asset('imagenes/usuarios/prueba.jpg') }}" class="img-fluid"
                                        alt="...">
                                </div>
                                <div class="rolUsuario text-capitalize d-flex justify-content-center"><strong>0</strong>
                                </div>
                                <div class="nombreUsuario mt-1 fs-5 d-flex justify-content-center"><strong>Ana M.
                                        Rodriguez</strong></div>
                                <div class="codigoQR d-flex justify-content-center mt-2 mb-3" id="codigoQR">
                                    {!! QrCode::size(100)->generate('Codigo Qr de prueba') !!}
                                </div>
                                <div class="facultad row mb-4 m-3"
                                    style="background-color: 0;color:white; border-radius: 5px">
                                    <div class="col-12 text-center text-wrap">
                                        <h5><strong>Facultad de Ingenierias</strong></h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <h6>Ingenieria Industrial</h6>
                                    </div>
                                </div>
                                <div class="valido d-flex justify-content-center mb-2"><strong
                                        style="font-weight: bold; font-size: 0.8em;">Valido hasta 2022-12-31</strong></div>
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
    <!-- ********************************************************************************************************************** -->
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/usuario/usuario.js') }}"></script>
@endsection
<!-- ************************************************************* -->
