<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Models\PQR\PQR;
use App\Models\PQR\tipoPQR;
use App\Models\PQR\Peticion;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\AsignacionTarea;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarPassword;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\Empleado;
use App\Models\Empresa\Equipo2;
use App\Models\Empresa\EquipoRentado;
use App\Models\Empresa\GlpiInfocom;
use App\Models\Empresa\GlpiState;
use App\Models\Empresa\RentadoEstado;
use App\Models\Intranet\Empresa\Dominio;
use DateTime;

class IntranetPageCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $equiposRentados = EquipoRentado::get();
        $equiposPropios = Equipo2::get();
        $estado_rentados = RentadoEstado::get();
        $estado_propios = GlpiState::whereIn('id',[3,9,7,6,5,0,11])->get();
        $dominioCorreos = Dominio::get();

        $equiposGLPI = Equipo2::with('entidad')->with('usuario')->get();

        foreach ($equiposGLPI as $equipo) {
            $infoComps = GlpiInfocom::where('itemtype','Computer')->where('items_id',$equipo->id)->get();
            foreach ($infoComps as $infoComp) {
                if ($equipo->id == $infoComp->items_id) {
                    $equipo['fec_compra'] = $infoComp->buy_date;
                    $meses = $this->verMeses(array($infoComp->buy_date,date('Y-m-d')));
                    $equipo['meses_uso'] = $meses;
                    break;
                }
            }
        }
        $mesesMin = $equiposGLPI->min('meses_uso');
        $mesesMax = $equiposGLPI->max('meses_uso');
        $data_mes = [];
        for ($i=$mesesMin; $i <= $mesesMax ; $i++) {
            if ($equiposGLPI->where('meses_uso',$i)->count()>0) {
                $data_mes[]= ['y'=> $equiposGLPI->where('meses_uso',$i)->count(),'label'=> $i];
            }
        }
        $centros_cotos = CentroCosto::get();
        $empleados = Empleado::get();
        $empleados_estado = $empleados->groupBy('estado');
        return view('intranet.index.index', compact('usuario','equiposRentados','estado_rentados','estado_propios','dominioCorreos','data_mes','centros_cotos' ,'empleados' ,'empleados_estado'));
    }

    private function verMeses($a){

        $f1 = new DateTime( $a[0] );
        $f2 = new DateTime( $a[1] );
       // obtener la diferencia de fechas
       $d = $f1->diff($f2);
       return  ( $d->y * 12 ) + $d->m;
    }
    public function restablecer_password(ValidarPassword $request)
    {
        $nuevoPassword['password'] = bcrypt(utf8_encode($request['password1']));
        $nuevoPassword['camb_password'] = 0;
        Usuario::findOrFail($request['id'])->update($nuevoPassword);
        return redirect('admin/index')->with('mensaje', 'Se cambio la contraseña de manera exitosa en la plataforma');
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
}
