@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/admin_rol.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Roles
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
                <h3 class="box-title">Listado de Roles</h3>
            </div>
            <br>
            <div class="box-body  card-primary">
                <div class="row mt-2 mb-2">
                    <div class="col-12 col-md-6 pl-3">

                    </div>
                    <div class="col-12 col-md-6 pr-5">
                        <a href="{{ route('admin-rol-crear') }}" class="btn btn-block btn-info btn-sm float-end"
                            style="max-width: 150px">
                            <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                        </a>
                    </div>
                </div>
                <table class="table table-striped table-hover table-sm tabla-borrando nowrap tabla_data_table_xs" id="tabla-data_2">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            @if ($data->nombre != 'Administrador Sistema')
                                <tr>
                                    <td>{{ $data->nombre }}</td>
                                    <td>
                                        <a href="{{ route('admin-rol-editar', ['id' => $data->id]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <form action="{{ route('admin-rol-eliminar', ['id' => $data->id]) }}"
                                            class="d-inline form-eliminar" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                title="Eliminar este registro">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/roles/rol.js') }}"></script>
@endsection
<!-- ************************************************************* -->
