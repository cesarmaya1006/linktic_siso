@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/usuario.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Importar Usuarios
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- Cuerpo hoja -->
@section('cuerpo_pagina')
<div class="card" style="border-top: 8px solid rgb(38, 160, 241);">
    @include('includes.error-form')
    @include('includes.mensaje')
    <div class="card-header">
        <h3 class="card-title">
            <font style="vertical-align: inherit;">Carga Masiva de Usuarios</font>
        </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('usuarios-import') }}" class="form-horizontal" method="POST" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-10 col-md-4 form-group">
                    <label for="file" class="requerido">Archivo de excel</label>
                    <input type="file" class="form-control" id="file" name="file" placeholder="Archivo de excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                    <small id="helpId" class="form-text text-muted">Archivo de excel</small>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @include('includes.botones_crear')
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/usuario/usuario.js') }}"></script>
@endsection
<!-- ************************************************************* -->
