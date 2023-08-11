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
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-body loading d-none">
            <div class="row">
                <div class="col-12 text-center">
                    <img class="img-fluid" src="{{asset('imagenes/sistema/cargando2.gif')}}" alt="">
                </div>
            </div>
        </div>
        <div class="card-header cuerpo">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Retiro de empleado: <strong>{{$empleado->usuario}}</strong></h5>
                </div>
                <div class="col-12 col-md-6 pr-5">
                    <a  href="{{ route('empleados') }}"
                        class="btn btn-success btn-sm btn-sombra text-center pl-3 pr-3 float-sm-right" style="font-size: 0.9em;"><i
                        class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
        </div>
        <div class="card-body cuerpo pb-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-3">Empresa:</div>
                            <div class="col-9"><strong>{{$empleado->empresa->empresa}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Cargo</div>
                            <div class="col-9"><strong>{{$empleado->cargo??'---'}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Cédula</div>
                            <div class="col-9"><strong>{{$empleado->cedula??'---'}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Teléfono</div>
                            <div class="col-9"><strong>{{$empleado->telefono??'---'}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Gestión</div>
                            <div class="col-9"><strong>{{$empleado->gestion->gestion??'Sin gestión'}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Tipo Contrato</div>
                            <div class="col-9"><strong>{{$empleado->contrato->tipo??'Sin tipo de contrato'}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">N° Ticket</div>
                            <div class="col-9"><strong>{{$empleado->ticket??'Sin Ticket'}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Centro Costo</div>
                            <div class="col-9"><strong>{{$empleado->centro->proyecto??'Sin proyecto'}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Estado</div>
                            <div class="col-9"><strong>{{$empleado->estado}}</strong></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" style="background-color: rgba(208, 215, 216, 0.384)">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h6><strong>Formulario de retiro</strong></h6>
                            </div>

                            <form data_url="{{route('retiro_confirmacion')}}" action="{{ route('empleados-retiro', ['id' => $empleado->id]) }}"  id="retiro_empleado" class="form-horizontal" method="POST">
                                @csrf
                                @method('post')
                                <input type="hidden" name="empresa" value="{{$empleado->empresa->empresa??'---'}}">
                                <input type="hidden" name="cargo" value="{{$empleado->cargo??'---'}}">
                                <input type="hidden" name="usuario" value="{{$empleado->usuario??'---'}}">
                                <input type="hidden" name="cedula" value="{{$empleado->cedula??'---'}}">
                                <input type="hidden" name="telefono" value="{{$empleado->telefono??'---'}}">
                                <input type="hidden" name="gestion" value="{{$empleado->gestion->gestion??'---'}}">
                                <input type="hidden" name="contrato" value="{{$empleado->contrato->tipo??'---'}}">
                                <input type="hidden" name="ticket" value="{{$empleado->ticket??'---'}}">
                                <input type="hidden" name="centro_costos" value="{{$empleado->centro->proyecto??'---'}}">
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label for="fecha_retiro" class="control-label requerido">Fecha de retiro</label>
                                            <input type="date" name="fecha_retiro" id="fecha_retiro" class="form-control form-control-sm" value="{{date('Y-m-d')}}" required/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="observaciones" class="control-label requerido">Observaciones de retiro</label>
                                            <textarea class="form-control" id="observaciones" name="observaciones" rows="5" style="resize: none;" required>N/A</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-4">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-xs btn-sombra pl-5 pr-5" type="submit">Retirar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/empresa/empleados/retiro.js') }}"></script>
@endsection
<!-- ************************************************************* -->
