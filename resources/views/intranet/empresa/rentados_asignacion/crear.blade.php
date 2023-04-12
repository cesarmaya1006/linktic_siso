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
                    <h5></h5>
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
            @if ($equipos->count()>0)
            <div class="row">
                <div class="col-12">
                    <h5>Equipos disponibles par asignación</h5>
                </div>
            </div>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm nowrap tabla_data_table" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Asignar Usurio</th>
                                <th>Devolver al proveedor</th>
                                <th class="text-center" style="white-space:nowrap;">Id</th>
                                <th class="text-center" style="white-space:nowrap;">Proveedor</th>
                                <th class="text-center" style="white-space:nowrap;">Responsable</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo de Equipo</th>
                                <th class="text-center" style="white-space:nowrap;">Serial</th>
                                <th class="text-center" style="white-space:nowrap;">Codigo</th>
                                <th class="text-center" style="white-space:nowrap;">Valor sin IVA</th>
                                <th class="text-center" style="white-space:nowrap;">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $equipo)
                            <tr>
                                <td class="text-center"><a href="{{route('admin-equipos_rentados_asignacion-asignar',['id' => $equipo->id])}}" class="btn btn-primary btn-xs bg-gradient">Asignar</a></td>
                                <td class="text-center"><a href="{{route('devolver_asignado_proveedor',['id' => $equipo->id])}}" class="btn btn-info btn-xs bg-gradient" id="btn_devolver">Devolver</a></td>
                                <td>{{$equipo->id}}</td>
                                <td class="text-left">{{$equipo->proveedor->proveedor}}</td>
                                <td class="text-left">{{$equipo->responsable->responsable}}</td>
                                <td class="text-center">{{$equipo->tipo->tipo}}</td>
                                <td class="text-center">{{$equipo->serial}}</td>
                                <td class="text-center">{{$equipo->codigo}}</td>
                                <td class="text-right">$ {{ number_format($equipo->valor,2,'.',',')}}</td>
                                <td class="text-left">{{$equipo->observaciones??''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="alert alert-danger alert-dismissible btn-sombra">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Sin equipos en bodega!</h5>
                        <p>No existen equipos disponibles para asignación en bodega en este momento.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @include('intranet.empresa.rentados.modales')
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/empresa/rentados/devolver.js') }}"></script>
@endsection
<!-- ************************************************************* -->
