@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <!-- <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}"> -->
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
Permisos - Roles
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Administración de Permisos Roles y menus</h5>
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <div class="row">
                    @csrf
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @php
                                    $control =0;
                                @endphp
                                @foreach ($roles as $rol)
                                    @php
                                        $control ++;
                                    @endphp
                                    <button
                                    class="nav-link {{$control==1?'active':''}}"
                                    id="nav-{{$rol->id}}-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-{{$rol->id}}"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-{{$rol->id}}"
                                    aria-selected="true">{{$rol->nombre}}</button>
                                @endforeach
                            </div>
                          </nav>
                          <div class="tab-content" id="nav-tabContent">
                            @php
                                $control =0;
                            @endphp
                            @foreach ($roles  as $rol)
                                @php
                                    $control ++;
                                @endphp
                                <div
                                    class="tab-pane fade {{$control==1?'show active':''}}"
                                    id="nav-{{$rol->id}}"
                                    role="tabpanel"
                                    aria-labelledby="nav-{{$rol->id}}-tab">
                                    <div class="row mt-3">
                                        <div class="col-3"><strong>Menu</strong></div>
                                        <div class="col-1 text-center"><strong>Listar</strong></div>
                                        <div class="col-1 text-center"><strong>Buscar</strong></div>
                                        <div class="col-1 text-center"><strong>Guardar</strong></div>
                                        <div class="col-1 text-center"><strong>Editar</strong></div>
                                        <div class="col-1 text-center"><strong>Eliminar</strong></div>
                                        <div class="col-4 text-end">
                                            <button class="btn btn-success btn-sombra btn-xs pl-5 pr-5" onclick="aplicar_permisos('{{route('permiso_rol_aplicar_permisos')}}')">Aplicar Permisos</button>
                                        </div>
                                    </div>
                                    @php
                                        $todos_listar = 1;
                                        $todos_buscar = 1;
                                        $todos_guardar = 1;
                                        $todos_actualizar = 1;
                                        $todos_borrar = 1;
                                        foreach ($rol->permisos_roles as $permiso) {
                                            if ($permiso->listar==0) {
                                                $todos_listar =0;
                                            }
                                            if ($permiso->buscar==0) {
                                                $todos_buscar =0;
                                            }
                                            if ($permiso->guardar==0) {
                                                $todos_guardar =0;
                                            }
                                            if ($permiso->actualizar==0) {
                                                $todos_actualizar =0;
                                            }
                                            if ($permiso->borrar==0) {
                                                $todos_borrar =0;
                                            }

                                        }
                                    @endphp
                                    <hr>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos_todos"
                                                    type="checkbox"
                                                    value=""
                                                    id="todos_listar_{{$rol->id}}"
                                                    name="todos_listar_{{$rol->id}}"
                                                    data-rolid="{{$rol->id}}"
                                                    data_url="{{route('admin-guardar_permiso_rol_todos',['id'=>$rol->id,'opcion'=>'listar'])}}"
                                                    data-permiso_opcion="listar"
                                                    {{$todos_listar==1?'checked':''}}
                                                    >
                                                <label class="form-check-label" for="flexCheckDefault"><strong>Todos</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos_todos"
                                                    type="checkbox"
                                                    value=""
                                                    id="todos_buscar_{{$rol->id}}"
                                                    name="todos_buscar_{{$rol->id}}"
                                                    data-rolid="{{$rol->id}}"
                                                    data_url="{{route('admin-guardar_permiso_rol_todos',['id'=>$rol->id,'opcion'=>'buscar'])}}"
                                                    data-permiso_opcion="buscar"
                                                    {{$todos_buscar==1?'checked':''}}
                                                    >
                                                <label class="form-check-label" for="flexCheckDefault"><strong>Todos</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos_todos"
                                                    type="checkbox"
                                                    value=""
                                                    id="todos_guardar_{{$rol->id}}"
                                                    name="todos_guardar_{{$rol->id}}"
                                                    data-rolid="{{$rol->id}}"
                                                    data_url="{{route('admin-guardar_permiso_rol_todos',['id'=>$rol->id,'opcion'=>'guardar'])}}"
                                                    data-permiso_opcion="guardar"
                                                    {{$todos_guardar==1?'checked':''}}
                                                    >
                                                <label class="form-check-label" for="flexCheckDefault"><strong>Todos</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos_todos"
                                                    type="checkbox"
                                                    value=""
                                                    id="todos_actualizar_{{$rol->id}}"
                                                    name="todos_actualizar_{{$rol->id}}"
                                                    data-rolid="{{$rol->id}}"
                                                    data_url="{{route('admin-guardar_permiso_rol_todos',['id'=>$rol->id,'opcion'=>'actualizar'])}}"
                                                    data-permiso_opcion="actualizar"
                                                    {{$todos_actualizar==1?'checked':''}}
                                                    >
                                                <label class="form-check-label" for="flexCheckDefault"><strong>Todos</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos_todos"
                                                    type="checkbox"
                                                    value=""
                                                    id="todos_borrar_{{$rol->id}}"
                                                    name="todos_borrar_{{$rol->id}}"
                                                    data-rolid="{{$rol->id}}"
                                                    data_url="{{route('admin-guardar_permiso_rol_todos',['id'=>$rol->id,'opcion'=>'borrar'])}}"
                                                    data-permiso_opcion="borrar"
                                                    {{$todos_borrar==1?'checked':''}}
                                                    >
                                                <label class="form-check-label" for="flexCheckDefault"><strong>Todos</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach ($rol->permisos_roles as $permiso)
                                    <div class="row mt-3">
                                        <div class="col-3"><strong>{{$permiso->menu->nombre}}</strong></div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos check_listar_{{$rol->id}}"
                                                    type="checkbox"
                                                    value=""
                                                    id="listar_{{$permiso->id}}"
                                                    name="listar_{{$permiso->id}}"
                                                    data-permisoid="{{$permiso->id}}"
                                                    data_url="{{route('_permiso-rol_cambio_permiso', ['id' => $permiso->id])}}"
                                                    data-permiso_opcion="listar"
                                                    {{$permiso->listar==1?'checked':''}}>
                                                <label class="form-check-label" for="flexCheckDefault"></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos check_buscar_{{$rol->id}}"
                                                    type="checkbox"
                                                    value=""
                                                    id="buscar_{{$permiso->id}}"
                                                    name="buscar_{{$permiso->id}}"
                                                    data-permisoid="{{$permiso->id}}"
                                                    data_url="{{route('_permiso-rol_cambio_permiso', ['id' => $permiso->id])}}"
                                                    data-permiso_opcion="buscar"
                                                    {{$permiso->buscar==1?'checked':''}}>
                                                <label class="form-check-label" for="flexCheckDefault"></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos check_guardar_{{$rol->id}}"
                                                    type="checkbox"
                                                    value=""
                                                    id="guardar_{{$permiso->id}}"
                                                    name="guardar_{{$permiso->id}}"
                                                    data-permisoid="{{$permiso->id}}"
                                                    data_url="{{route('_permiso-rol_cambio_permiso', ['id' => $permiso->id])}}"
                                                    data-permiso_opcion="guardar"
                                                    {{$permiso->guardar==1?'checked':''}}>
                                                <label class="form-check-label" for="flexCheckDefault"></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos check_actualizar_{{$rol->id}}"
                                                    type="checkbox"
                                                    value=""
                                                    id="actualizar_{{$permiso->id}}"
                                                    name="actualizar_{{$permiso->id}}"
                                                    data-permisoid="{{$permiso->id}}"
                                                    data_url="{{route('_permiso-rol_cambio_permiso', ['id' => $permiso->id])}}"
                                                    data-permiso_opcion="actualizar"
                                                    {{$permiso->actualizar==1?'checked':''}}>
                                                <label class="form-check-label" for="flexCheckDefault"></label>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input check_permisos check_borrar_{{$rol->id}}"
                                                    type="checkbox"
                                                    value=""
                                                    id="borrar_{{$permiso->id}}"
                                                    name="borrar_{{$permiso->id}}"
                                                    data-permisoid="{{$permiso->id}}"
                                                    data_url="{{route('_permiso-rol_cambio_permiso', ['id' => $permiso->id])}}"
                                                    data-permiso_opcion="borrar"
                                                    {{$permiso->borrar==1?'checked':''}}>
                                                <label class="form-check-label" for="flexCheckDefault"></label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                          </div>
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
<script src="{{ asset('js/intranet/sistema/permisos_rol.js') }}"></script>
@endsection
<!-- ************************************************************* -->
