@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/intranet/empresa/caracteristicas/crear.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Pagos de correos
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
            <h3 class="card-title"> Nuevo Pago de correo </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admin-pagos-store') }}" class="form-horizontal" method="POST">
            @csrf
            @method('post')
            <div class="card-body">
                @include('intranet.empresa.pagos_correo_corporativo.form')
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-primary btn-sobra btn-xs pl-5 pr-5" type="submit">Guardar</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/caracteristicas/crear.js') }}"></script>
@endsection
<!-- ************************************************************* -->
