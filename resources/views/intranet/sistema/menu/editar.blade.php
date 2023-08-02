@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
  <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Editar Menus
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
        <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar Men&uacute; {{ $data->nombre }}</font></font></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin-menu-actualizar', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
        @csrf
        @method('put')
        <div class="card-body">
            @include('intranet.sistema.menu.form')
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
<!-- titulo hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/admin/crear.js') }}"></script>
@endsection
<!-- ************************************************************* -->
