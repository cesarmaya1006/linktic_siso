<div class="container-fluid">
    <div class="row">
        <div class="col-12"><h3>Equipos Rentados</h3></div>
        @foreach ($estado_rentados as $estado)
            <div class="col-lg-3 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$estado->equipos->count()}}</h3>
                        <p>Cantidad de equipos alquilados por {{$estado->estado}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
