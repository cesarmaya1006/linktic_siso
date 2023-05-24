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
    Empleados
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @csrf
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Empleados - Asignación de otros elementos</h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a  href="{{ route('empleados-editar', ['id' => $empleado->id]) }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3 float-sm-right"
                        style="font-size: 0.9em;">
                        <i class="fas fa-reply mr-2"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pb-3">
            <div class="container-fluid">
                <form action="{{ route('otros_asignacion',['id' => $empleado->id]) }}" class="form-horizontal" method="POST">
                    @csrf
                    @method('post')
                    <input type="hidden" name="empleado_id" value="{{$empleado->id}}">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="elemento" class="control-label requerido">Elemento</label>
                                <input type="text" name="elemento" id="elemento" class="form-control form-control-sm" value="{{old('elemento', $otro->elemento ?? '')}}" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="entidad" class="control-label requerido">Entidad</label>
                                <input type="text" name="entidad" id="entidad" class="form-control form-control-sm" value="{{old('entidad', $otro->entidad ?? '')}}" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="otro_estado_id" class="control-label requerido">Estado</label>
                                <select class="form-control form-control-sm" name="otro_estado_id" id="otro_estado_id" required>
                                    <option value="">--Seleccione--</option>
                                    @foreach ($estados as $estado)
                                    <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="fabricante" class="control-label requerido">Fabricante</label>
                                <input type="text" name="fabricante" id="fabricante" class="form-control form-control-sm" value="{{old('fabricante', $otro->fabricante ?? '')}}" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="num_serie" class="control-label requerido">Número Serie</label>
                                <input type="text" name="num_serie" id="num_serie" class="form-control form-control-sm" value="{{old('num_serie', $otro->num_serie ?? '')}}" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="localizacion" class="control-label requerido">Localización</label>
                                <input type="text" name="localizacion" id="localizacion" class="form-control form-control-sm" value="{{old('localizacion', $otro->localizacion ?? '')}}" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="tipo" class="control-label requerido">Tipo</label>
                                <input type="text" name="tipo" id="tipo" class="form-control form-control-sm" value="{{old('tipo', $otro->tipo ?? '')}}" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="modelo" class="control-label requerido">Modelo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control form-control-sm" value="{{old('modelo', $otro->modelo ?? '')}}" required/>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="comentario" class="control-label requerido">Comentarios</label>
                                <input type="text" name="comentario" id="comentario" class="form-control form-control-sm" value="{{old('comentario', $otro->comentario ?? '')}}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4 mb-5">
                            <button class="btn btn-primary btn-sobra btn-xs btn-sombra pl-5 pr-5" type="submit">Guardar</button>
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/empresa/empleados/asignacion_otros.js') }}"></script>
@endsection
<!-- ************************************************************* -->
