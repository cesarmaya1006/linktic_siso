@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')

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
                    <h1 class="m-0">Registrar Devolucion</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('inventarios') }}">Inventarios</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('prestamos',['id'=>$prestamo->producto->inventario->id]) }}">Prestamos</a></li>
                        <li class="breadcrumb-item active">Registrar Devoluciones</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 text-md-right pl-2 pr-md-5">
                    <a href="{{ route('prestamos',['id'=>$prestamo->producto->inventario->id]) }}"class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;">
                        <i class="fas fa-reply mr-2"></i> Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('prestamos-actualizar',['id' => $prestamo->id]) }}" class="form-horizontal row"
                        method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Información del usuario que realizó el prestamo</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-md-right">Usuario:</div>
                                        <div class="col-12 col-md-9"><strong>{{ $prestamo->persona->nombre1 . ' ' . $prestamo->persona->nombre2 . ' ' . $prestamo->persona->apellido1 . ' ' . $prestamo->persona->apellido2}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-md-right">Tipo Usuario:</div>
                                        <div class="col-12 col-md-9"><strong>{{ $prestamo->persona->usuario->roles[0]->nombre}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-md-right">Segmentación:</div>
                                        <div class="col-12 col-md-9"><strong>{{ $prestamo->persona->cargo_id > 0 ? $prestamo->persona->cargo->area->area . ' - ' . $prestamo->persona->cargo->cargo : $prestamo->persona->carrera->facultad->facultad . ' - ' . $prestamo->persona->carrera->carrera }}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-md-right">Identificación:</div>
                                        <div class="col-12 col-md-9"><strong>{{ $prestamo->persona->tipos_docu->abreb_id . '  ' . $prestamo->persona->identificacion}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-md-right">Teléfono:</div>
                                        <div class="col-12 col-md-9"><strong>{{ $prestamo->persona->telefono}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-md-right">Dirección:</div>
                                        <div class="col-12 col-md-9"><strong>{{ $prestamo->persona->direccion}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-3 text-md-right">Email:</div>
                                        <div class="col-12 col-md-9"><strong>{{ $prestamo->persona->email}}</strong></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Información del prestamo</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-md-right">Persona que realizó el prestamo:</div>
                                        <div class="col-12 col-md-8"><strong>{{ $prestamo->usuario->persona->nombre1 . ' ' . $prestamo->usuario->persona->nombre2 . ' ' . $prestamo->usuario->persona->apellido1 . ' ' . $prestamo->usuario->persona->apellido2}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-md-right">Elemento prestado:</div>
                                        <div class="col-12 col-md-8"><strong>{{ $prestamo->producto->elemento}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-md-right">Fecha y hora del prestamo:</div>
                                        <div class="col-12 col-md-8"><strong>{{ $prestamo->fec_prestamo . ' - ' . $prestamo->hor_prestamo}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-md-right">Fecha y hora vencimiento:</div>
                                        <div class="col-12 col-md-8"><strong>{{ $prestamo->fec_vencimiento . ' - ' . $prestamo->hor_vencimiento}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-md-right">Cantidad:</div>
                                        <div class="col-12 col-md-8"><strong>{{ $prestamo->cantidad }}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-md-right">Estado:</div>
                                        <div class="col-12 col-md-8 {{$prestamo->estado ==1 ? 'text-success' : 'text-danger'}}"><strong>{{$prestamo->estado ==1 ? 'Oportuno' : 'Vencido'}}</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-md-right">Observaciones:</div>
                                        <div class="col-12 col-md-8"><p align="justify">{{$prestamo->observaciones }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-2 form-group">
                                    <label for="fec_entrega" class="requerido">Fecha de Devolución</label>
                                    <span class="form-control form-control-sm text-center">{{date('Y-m-d')}}</span>
                                    <input type="hidden" name="fec_entrega" value="{{date('Y-m-d')}}" required>
                                    <small id="helpId" class="form-text text-muted">Fecha Devolución</small>
                                </div>
                                <div class="col-12 col-md-2 form-group">
                                    <label for="hor_entrega" class="requerido">Hora de Devolución</label>
                                    <span class="form-control form-control-sm text-center">{{date('g:i a')}}</span>
                                    <input type="hidden" name="hor_entrega" value="{{date('H:i:s')}}" required>
                                    <small id="helpId" class="form-text text-muted">Hora Devolución</small>
                                </div>
                                <div class="col-12 col-md-1 form-group">
                                    <label for="tipo_entrega" class="requerido">Tipo de entrega</label>
                                    <select class="form-control form-control-sm" name="tipo_entrega" id="tipo_entrega">
                                        <option value="Total">Total</option>
                                        <option value="Parcial">Parcial</option>
                                    </select>
                                    <small id="helpId" class="form-text text-muted">Tipo de entrega</small>
                                </div>
                                <div class="col-12 col-md-1 form-group">
                                    <label for="cantidad_entrega" class="requerido">Cantidad</label>
                                    <input type="number" class="form-control form-control-sm text-right" name="cantidad_entrega" id="cantidad_entrega" aria-describedby="helpId" value="{{$prestamo->cantidad}}" min="1" max="{{$prestamo->cantidad}}" required>
                                    <small id="helpId" class="form-text text-muted">Cantidad</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="estado_entrega" class="requerido">Observaciones de la entrega</label>
                                    <textarea class="form-control form-control-sm" name="estado_entrega" id="estado_entrega" rows="6" cols="40">Observaciones</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm btn-sombra pl-5 pr-5">Generar Devolución</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/universidad/prestamos.js') }}"></script>
@endsection
<!-- ************************************************************* -->
