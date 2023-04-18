@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/intranet/empresa/rentados/crear.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Equipos Rentados
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
                    <h5>Devolver equipo a bodega</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('admin-equipos_rentados') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h5><strong>Datos del equipo</strong></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">{{$equipo->serial . ' - ' . $equipo->codigo}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 text-right"><strong>Tipo de equipo</strong></div>
                                    <div class="col-6">{{$equipo->tipo->tipo}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right"><strong>Centro de costo</strong></div>
                                    <div class="col-6">{{$equipo->centro_costo->proyecto}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right"><strong>Fecha de entrega al usuario:</strong></div>
                                    <div class="col-6">{{$equipo->asignaciones->last()->fecha_asignacion}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right"><strong>Ticket:</strong></div>
                                    <div class="col-6">{{$equipo->ticket}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right"><strong>Valor sin IVA:</strong></div>
                                    <div class="col-6">$ {{number_format($equipo->valor,2,'.',',')}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right"><strong>Meses en uso:</strong></div>
                                    <div class="col-6">{{$equipo->meses_uso_asignado}} meses</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right"><strong>Responsable:</strong></div>
                                    <div class="col-6">{{$equipo->responsable->responsable}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h6>Formulario devolución de equipo a bodega</h6>
                            </div>
                        </div>
                        <form action="{{ route('devolver_asignado_bodega_devolver', ['id' => $equipo->id]) }}" class="form-horizontal" method="post">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label for="codigo" class="control-label requerido">Fecha Devolucióna Bodega</label>
                                        <input type="hidden" name="rentado_estado_id" value="2">
                                        <input type="hidden" name="fecha_devolucion" value="{{date('Y-m-d')}}">
                                        <span class="form-control form-control-sm" >{{date('Y-m-d')}}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="codigo" class="control-label">Observaciones previas:</label>
                                        <p style="text-align: justify">{{$equipo->observaciones}}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="observaciones" class="control-label">Observaciones</label>
                                        <textarea class="form-control" id="observaciones" name="observaciones" rows="5" style="resize: none;"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn-sombra btn-xs pl-5 pr-5" type="submit">Devolver a bodega</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer -->
    </div>
    @include('intranet.empresa.rentados.modales')
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/rentados/crear.js') }}"></script>
@endsection
<!-- ************************************************************* -->
