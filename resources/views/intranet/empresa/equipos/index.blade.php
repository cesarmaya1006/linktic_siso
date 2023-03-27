@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/empresa/equipos/equipos.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/buttons.dataTables.min.css') }}">

@endsection



<!-- ************************************************************* -->
@section('tituloHoja')
    Equipos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>listado de equipos</h5>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover table-sm tabla-borrando nowrap" id="tablaEquipos">
                        <thead class="thead-inverse">
                            <tr>
                                <th></th>
                                <th style="white-space:nowrap;">Nombre<span class="sort-indicator"><i class="fas fa-sort-up"></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Entidad<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Usuario<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Estado<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Fabricantes<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Número de serie<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Tipo<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Fecha de Compra<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Meses de uso<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Porcentaje de uso<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Modelo<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Sistema operativo - Nombre<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Localizaciones<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Componentes - Procesadores<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Volumes - Tamaño global<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Componentes - Memoria<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                                <th style="white-space:nowrap;">Grupos<span class="sort-indicator"><i class=""></i><span class="sort-num"></span></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equiposGLPI as $equipo)
                            <tr>
                                <td></td>
                                <td>{{$equipo->name}}</td>
                                <td>{{$equipo->entidad->completename}}</td>
                                <td>{{$equipo->usuario->firstname?? ''}} {{$equipo->usuario->realname?? ''}}</td>
                                <td>{{$equipo->estado->name?? ''}}</td>
                                <td>{{$equipo->fabricante->name?? ''}}</td>
                                <td>{{$equipo->serial}}</td>
                                <td>{{$equipo->tipoComputador->name?? ''}}</td>
                                <td>{{$equipo->fec_compra?? ''}}</td>
                                <td>{{$equipo->meses_uso?? ''}} Meses
                                        @php
                                        $barras = '';
                                        if ($equipo->porcentaje<=50) {
                                            $barras .='<div class="progress-bar bg-success" role="progressbar" style="width: '.$equipo->porcentaje.'%" aria-valuenow="'.$equipo->porcentaje.'" aria-valuemin="0" aria-valuemax="100"></div>';
                                        } else {
                                            $barras .='<div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';
                                            if ($equipo->porcentaje<=65) {
                                                $barras .='<div class="progress-bar" role="progressbar" style="width: '.(50 - $equipo->porcentaje).'%" aria-valuenow="'.(50 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                            } else {
                                                $barras .='<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>';
                                                if ($equipo->porcentaje<=75) {
                                                    $barras .='<div class="progress-bar bg-info" role="progressbar" style="width: '.(65 - $equipo->porcentaje).'%" aria-valuenow="'.(65 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                                } else {
                                                    $barras .='<div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
                                                    if ($equipo->porcentaje<=85) {
                                                        $barras .='<div class="progress-bar bg-warning" role="progressbar" style="width: '.(75 - $equipo->porcentaje).'%" aria-valuenow="'.(75 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                                    } else {
                                                        $barras .='<div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>';
                                                        if ($equipo->porcentaje<=100) {
                                                            $barras .='<div class="progress-bar bg-danger" role="progressbar" style="width: '.(85 - $equipo->porcentaje).'%" aria-valuenow="'.(85 - $equipo->porcentaje).'" aria-valuemin="0" aria-valuemax="100"></div>';
                                                        } else {
                                                            $barras .='<div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>';
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        @endphp
                                        <div class="progress">
                                            {!!$barras!!}
                                          </div>
                                </td>
                                <td class="text-right">{{$equipo->porcentaje?? ''}} %</td>
                                <td>{{$equipo->modeloComputador->name?? ''}}</td>
                                <td>{{$equipo->sistemaOp->name?? ''}}</td>
                                <td>{{$equipo->locacion->name?? ''}}</td>
                                <td>{{$equipo->procesadores[0]->designation?? ''}}</td>
                                <td>
                                    @foreach ($equipo->itemsdevicedrives as $item)
                                    <p>{{number_format(($item->capacity)/1000,2).' GB'}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($equipo->itemsdevicememories as $item)
                                    <p>{{number_format(($item->size)/1000,0).' GB'}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    {{$equipo->grupo->completename?? ''}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/empresa/equipos/equipos.js') }}"></script>
<script src="{{ asset('dataTable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dataTable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dataTable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dataTable/jszip.min.js') }}"></script>
<script src="{{ asset('dataTable/buttons.html5.min.js') }}"></script>

@endsection
<!-- ************************************************************* -->
