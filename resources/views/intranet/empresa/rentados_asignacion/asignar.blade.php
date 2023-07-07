@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
   <!-- <link rel="stylesheet" href="{{ asset('css/intranet/empresa/rentados/crear.css') }}"> -->
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Equipos Rentados Asignación
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('cuerpo_pagina')
    <div class="card pb-4">
        {{ $mensaje ?? '' }}
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Nueva Asignación</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('admin-equipos_rentados') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row d-flex justify-content-center mt-3 mb-5">
                <div class="col-11 col-md-9 p-4">
                    <div class="row">
                        <div class="col-12">
                            <h5><strong>Datos del equipo</strong></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Id Equipo: </strong></div>
                                <div class="col-12 col-md-8">{{$equipo->id}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Proveedor: </strong></div>
                                <div class="col-12 col-md-8">{{$equipo->proveedor->proveedor}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Centro de costo: </strong></div>
                                <div class="col-12 col-md-8">{{$equipo->centro_costo->proyecto}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Sub centro de costo:</strong></div>
                                <div class="col-12 col-md-8">{{$equipo->centro_costo->sub_centro_costo->centro??'---'}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Responsable:</strong></div>
                                <div class="col-12 col-md-8">{{$equipo->responsable->responsable}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Tipo de equipo:</strong></div>
                                <div class="col-12 col-md-8">{{$equipo->tipo->tipo}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Serial:</strong></div>
                                <div class="col-12 col-md-8">{{$equipo->serial}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Valor sin IVA:</strong></div>
                                <div class="col-12 col-md-8">{{'$ '. number_format($equipo->valor,2,'.',',')}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4 text-md-right"><strong>Observaciones:</strong></div>
                                <div class="col-12 col-md-8"><p style="text-align: justify">{{$equipo->observaciones}}</p></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h5>Formulario de asignación</h5>
                                </div>
                            </div>
                            <form action="{{ route('admin-equipos_rentados_asignacion-guardar') }}" class="form-horizontal row" id="form_modal_asignados" method="POST">
                                @csrf
                                @method('post')
                                <input type="hidden" name="equipo_rentado_id" value="{{$equipo->id}}">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="rentado_asignado_id" class="control-label requerido">Usuario/Entidad</label>
                                        <div class="input-group mb-3">
                                            <a class="btn btn-outline-info" type="button" id="button_modal_asignado"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                            <select class="form-control" name="rentado_asignado_id" id="rentado_asignado_id" required>
                                                <option value="">--Seleccione--</option>
                                                @foreach ($personas as $persona)
                                                <option value="{{$persona->id}}">{{$persona->asignado}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="fecha_asignacion" class="control-label requerido">Fecha de Asignación</label>
                                        <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control pr-3" value="{{date('Y-m-d')}}" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="observaciones_asignacion" class="control-label">Observaciones de entrega</label>
                                        <textarea class="form-control form-control-sm" id="observaciones_asignacion" name="observaciones_asignacion" rows="5" style="resize: none;" >{{$equipo->observaciones}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-info btn-sombra pl-5 pr-5"> Guardar Asignación</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('intranet.empresa.rentados_asignacion.modales')
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/rentados_asignacion/asignar.js') }}"></script>
@endsection
<!-- ************************************************************* -->
