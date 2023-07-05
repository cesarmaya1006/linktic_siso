@extends('theme.back.plantilla')
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/intranet/permisos/permisos_menu_cargo.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Permisos - Roles
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
                <h3 class="box-title">Administración de Permisos Roles y menus</h3>
            </div>
            <br>
            <div class="box-body  card-primary" style="max-height: 800px;overflow-y: auto;">
                @csrf
                <hr>
                <div class="row d-flex justify-content-around">
                    <div class="col-12 col-md-4 form-group">
                        <label for="area_id">Área</label>
                        <select class="form-control form-control-sm" data_url="{{ route('admin-cargar_cargos') }}"
                            id="area_id">
                            <option value="">--Seleccione--</option>
                            @foreach ($areas as $area)
                                @if ($area->cargos->count())
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="helpId" class="form-text text-muted">Área</small>
                    </div>
                    <div class="col-12 col-md-4 form-group">
                        <label for="cargo_id">Cargo</label>
                        <select class="form-control form-control-sm" id="cargo_id"
                            data_url="{{ route('admin-cargar_menu_permisos') }}">
                            <option value="">--Seleccione un area--</option>
                        </select>
                        <small id="helpId" class="form-text text-muted">Cargo</small>
                    </div>
                </div>
                <hr>
                <div class="row cajaCargos d-flex justify-content-around p-3 sombra p-4" id="cajaCargos"
                    style="visibility: hidden">
                    <div class="col-12 col-md-3 p-2 mini_sombra m-2">
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <h6></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input check_permisos" onchange="cambioPermisos()" type="checkbox" value=""
                                        id="" name="" data-permisoid="" data_url=""
                                        data-permiso_opcion="listar">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Listar
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input check_permisos" onchange="cambioPermisos()" type="checkbox" value=""
                                        id="" name="" data-permisoid="" data_url=""
                                        data-permiso_opcion="listar">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Buscar
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input check_permisos" onchange="cambioPermisos()" type="checkbox" value=""
                                        id="" name="" data-permisoid="" data_url=""
                                        data-permiso_opcion="listar">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Guardar
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input check_permisos" onchange="cambioPermisos()" type="checkbox" value=""
                                        id="" name="" data-permisoid="" data_url=""
                                        data-permiso_opcion="listar">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Actualizar
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input check_permisos" onchange="cambioPermisos()" type="checkbox" value=""
                                        id="" name="" data-permisoid="" data_url=""
                                        data-permiso_opcion="listar">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Eliminar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="data_url_check" id="data_url_check"
        data_url_check="{{ route('admin-modificar_menu_permisos') }}">
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/permisos/permiso_rol.js') }}"></script>
@endsection
<!-- ************************************************************* -->
