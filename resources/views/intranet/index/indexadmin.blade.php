<div class="container-fluid">
    <div class="row">
        <div class="col-12"><h3>Empleados</h3></div>
        <div class="col-lg-3 col-12">
            <div class="small-box bg-primary bg-gradient mini_sombra">
                <div class="inner">
                    <h3 class="contador" data_numero="{{$empleados->count()}}" >0</h3>
                    <p>Cantidad empleados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-desktop"></i>
                </div>
                <a href="{{route('admin-equipos_rentados')}}" class="small-box-footer">Mas Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @foreach ($empleados_estado as $empleado)
            <div class="col-lg-3 col-12">
                <div class="small-box bg-primary bg-gradient mini_sombra">
                    <div class="inner">
                        <h3 class="contador" data_numero="{{$empleado->count()}}" >0</h3>
                        <p>Estado: {{$empleado[0]['estado']}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <a href="{{route('admin-equipos_rentados')}}" class="small-box-footer">Mas Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-12"><h3>Equipos Rentados</h3></div>
        @foreach ($estado_rentados as $estado)
            <div class="col-lg-3 col-12">
                <div class="small-box bg-info bg-gradient mini_sombra">
                    <div class="inner">
                        <h3 class="contador" data_numero="{{$estado->equipos->count()}}" >0</h3>
                        <p>Estado {{$estado->estado}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <a href="{{route('admin-equipos_rentados')}}" class="small-box-footer">Mas Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-12"><h3>Equipos Propios</h3></div>
        @foreach ($estado_propios as $estado)
            <div class="col-lg-2 col-12">
                <div class="small-box bg-success bg-gradient mini_sombra">
                    <div class="inner">
                        <h3 class="contador" data_numero="{{$estado->equipos->count()}}" >0</h3>
                        <p>Estado: {{$estado->name}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-laptop-house"></i>
                    </div>
                    <a href="{{route('admin-equipos')}}" class="small-box-footer">Mas Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-3 mb-5">
        <div class="col-12-">
            <h3>Equipos por meses de uso</h3>
        </div>
        <div class="col-12 mt-4">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
    <hr>
    <hr>
    <div class="row">
        <div class="col-12"><h3>Correo Activos</h3></div>
        @foreach ($dominioCorreos as $dominio)
            <div class="col-lg-2 col-12">
                <div class="small-box bg-secondary bg-gradient mini_sombra">
                    <div class="inner">
                        <h3 class="contador" data_numero="{{$dominio->correos->count()}}" >0</h3>
                        <p>Dominio: {{$dominio->dominio}}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="{{route('correos')}}" class="small-box-footer">Mas Info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-12 mb-4"><h3>Equipos prestados por centro de costo</h3></div>
        @foreach ($centros_cotos as $centro)
            @if ($centro->equipos->count()>0)
                <div class="col-lg-4 col-12">
                    <div class="small-box bg-warning bg-gradient mini_sombra">
                        <div class="inner">
                            <h3 class="contador" data_numero="{{$centro->equipos->count()}}" >0</h3>
                            <p>Centro de Costo: {{$centro->proyecto}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <a href="{{route('correos')}}" class="small-box-footer">Mas Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script type="text/javascript">
 window.onload = function () {

 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2", // "light1", "light2", "dark1", "dark2"
     title: {
         text: "Equipos por meses de uso"
     },
     axisY: {
         title: "Cantidad de Equipos"
     },
     data: [{
         type: "column",
         dataPoints: <?php echo json_encode($data_mes, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();

 }
</script>
