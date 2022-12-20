@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Inventarios
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
<div class="card">
    @include('includes.error-form')
    @include('includes.mensaje')
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Entradas Inventario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventarios') }}">Inventarios</a></li>
                        <li class="breadcrumb-item active">Inventarios - Entradas</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 text-md-right pl-2 pr-md-5">
                    <a href="{{ route('inventarios') }}"class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;">
                        <i class="fas fa-reply mr-2"></i> Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a
                        href="{{ route('elementos-crear',['id'=>$inventario->id]) }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3"
                        style="font-size: 0.9em;">
                        <i class="fas fa-plus-circle mr-2"></i> Nuevo Elemento
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('entradas-guardar') }}" class="form-horizontal row"
                        method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="usuario_id" value="{{ session('id_usuario') }}">
                                <div class="col-12 col-md-6 form-group">
                                    <label for="producto_id" class="requerido">Producto</label>
                                    <select class="form-control form-control-sm" id="producto_id" name="producto_id" required>
                                        <option value="">---Seleccione---</option>
                                        @foreach ($inventario->productos as $producto)
                                            <option value="{{ $producto->id }}">
                                                {{ $producto->elemento}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small id="helpId" class="form-text text-muted">Producto</small>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label for="proveedor">Proveedor</label>
                                    <input type="text" class="form-control form-control-sm" name="proveedor" id="proveedor"
                                        aria-describedby="helpId" value="{{ old('proveedor') }}"
                                        placeholder="Nombre del proveedor">
                                    <small id="helpId" class="form-text text-muted">Nombre del proveedor</small>
                                </div>
                                <div class="col-12 col-md-2 form-group">
                                    <label for="fec_ingreso" class="requerido">Fecha de ingreso</label>
                                    <input type="date" class="form-control form-control-sm" name="fec_ingreso" id="fec_ingreso"
                                        aria-describedby="helpId" value="{{ date('Y-m-d') }}" required>
                                    <small id="helpId" class="form-text text-muted">Fecha de ingreso</small>
                                </div>
                                <div class="col-12 col-md-1 form-group">
                                    <label for="cantidad" class="requerido">Cantidad</label>
                                    <input type="number" class="form-control form-control-sm text-right" name="cantidad" id="cantidad"
                                        aria-describedby="helpId" value="1" min="1" required>
                                    <small id="helpId" class="form-text text-muted">Cantidad</small>
                                </div>
                                <div class="col-12 col-md-1 form-group">
                                    <label for="costo" class="requerido">Costo por unidad</label>
                                    <input type="number" class="form-control form-control-sm text-right" name="costo" id="costo"
                                        aria-describedby="helpId" value="0" min="0" required>
                                    <small id="helpId" class="form-text text-muted">Costo por unidad</small>
                                </div>
                                <div class="col-12 col-md-8 form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <input type="text" class="form-control form-control-sm" name="observaciones" id="observaciones"
                                        aria-describedby="helpId">
                                    <small id="helpId" class="form-text text-muted">Observaciones</small>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Guardar</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-12">
                    <h6>Historico de entradas inventario: {{$inventario->nom_inventario}}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Proveedor</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Costo x Unidad</th>
                                <th class="text-center">Costo Total</th>
                                <th class="text-center">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventario->productos as $producto)
                            @foreach ($producto->entradasinv as $entrada)
                            <tr>
                                <td class="text-center">{{ $entrada->id }}</td>
                                <td class="text-center">{{ $entrada->fec_ingreso }}</td>
                                <td class="text-center">{{ $entrada->usuario->persona->nombre1 . ' ' . $entrada->usuario->persona->nombre2 . ' ' . $entrada->usuario->persona->apellido1 . ' ' . $entrada->usuario->persona->apellido2 }}</td>
                                <td class="text-center">{{ $producto->elemento }}</td>
                                <td class="text-center">{{ $entrada->proveedor }}</td>
                                <td class="text-center">{{ $entrada->cantidad }}</td>
                                <td class="text-center">{{ $entrada->costo }}</td>
                                <td class="text-center">{{ $entrada->cantidad * $entrada->costo}}</td>
                                <td class="text-center">{{ $entrada->observaciones }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/carreras/carreras.js') }}"></script>
@endsection
<!-- ************************************************************* -->
