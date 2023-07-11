@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Crear Roles
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('cuerpo_pagina')
    <div class="card" style="border-top: 8px solid rgb(38, 160, 241);">
        {{ $mensaje ?? '' }}
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Editar Usuario (datos básicos)</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('usuarios-index') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admin-usuario-actualizar', ['id' => $data->id]) }}" class="form-horizontal" method="POST"
            autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                @include('intranet.sistema.usuario.form')
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                @include('includes.botones_editar')
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/usuario/crear.js') }}"></script>
@endsection
<!-- ************************************************************* -->
