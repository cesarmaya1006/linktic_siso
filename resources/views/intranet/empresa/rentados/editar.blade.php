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
    Editar Equipo Rentado
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
            <h3 class="card-title">Edición Equipo Rentado</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            @if ($equipo->rentado_estado_id == 1)
            <div class="row mb-4">
                <div class="col-12">
                    <a class="btn btn-info btn-xs btn-sombra pl-5 pr-5" href="{{route('devolver_asignado_proveedor',['id' => $equipo->id])}}">Devolver al proveedor</a>
                </div>
            </div>
            <hr>
            @else
            <div class="row mb-4">
                <div class="col-12">
                    <a class="btn btn-success btn-xs btn-sombra pl-5 pr-5" href="{{route('devolver_asignado_bodega',['id' => $equipo->id])}}">Devolver a bodega</a>
                </div>
            </div>
            <hr>
            @endif

        <form action="{{ route('admin-equipos_rentados-actualizar', ['id' => $equipo->id]) }}" class="form-horizontal" method="POST">
            @csrf
            @method('put')

                @include('intranet.empresa.rentados.form')
                <button class="btn btn-primary btn-sobra btn-xs pl-5 pr-5" type="submit">Actualizar</button>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/caracteristicas/crear.js') }}"></script>
@endsection
<!-- ************************************************************* -->
