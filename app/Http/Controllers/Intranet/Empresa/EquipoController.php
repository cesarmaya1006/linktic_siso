<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Equipo;
use App\Models\Empresa\Equipo2;
use App\Models\Empresa\GlpiInfocom;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::get();
        $equiposGLPI = Equipo2::with('entidad')->with('usuario')->get();
        $infoComps = GlpiInfocom::where('itemtype','Computer')->get();
        foreach ($equiposGLPI as $equipo) {
            foreach ($infoComps as $infoComp) {
                if ($equipo->id == $infoComp->items_id) {
                    $equipo['fec_compra'] = $infoComp->buy_date;
                    $meses = $this->verMeses(array($infoComp->buy_date,date('Y-m-d')));
                    $equipo['meses_uso'] = $meses;
                    $equipo['porcentaje'] = round((($meses*100)/60),2);
                    break;
                }
            }
        }
        //dd($equiposGLPI->toArray());
        return view('intranet.empresa.equipos.index', compact('equipos','equiposGLPI'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function verMeses($a){

        $f1 = new DateTime( $a[0] );
        $f2 = new DateTime( $a[1] );
       // obtener la diferencia de fechas
       $d = $f1->diff($f2);
       return  ( $d->y * 12 ) + $d->m;
    }
}
