<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\AsignacionRentado;
use App\Models\Empresa\Equipo2;
use App\Models\Empresa\EquipoRentado;
use App\Models\Empresa\RentadoAsignado;
use DateTime;
use Illuminate\Http\Request;

class EquiposRentadosAsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentados_asignados = AsignacionRentado::orderBy('rentado_asignado_id')->get();
        foreach ($rentados_asignados as $asignado) {
            if ($asignado->equipo->rentado_estado_id == 3 && $asignado->fecha_devolucion==null) {
                $fechaUso = date('Y-m-d');
                $meses = $this->verMeses(array($asignado->fecha_asignacion,$fechaUso));
                $asignado['meses_uso'] = $meses;
            } else {
                if ($asignado->fecha_devolucion!=null) {
                    $fechaUso = $asignado->fecha_devolucion;
                    $meses = $this->verMeses(array($asignado->equipo->fecha_entrega,$fechaUso));
                    $asignado['meses_uso'] = $meses;
                } else {
                    $asignado['meses_uso'] = 'Sin Fecha de devolución';
                }
            }
        }
        return view('intranet.empresa.rentados_asignacion.index', compact('rentados_asignados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $equipos = EquipoRentado::where('rentado_estado_id',1)->get();
        return view('intranet.empresa.rentados_asignacion.crear',compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function asignar($id)
    {
        $equipo = EquipoRentado::findOrFail($id);
        $personas = RentadoAsignado::get();
        return view('intranet.empresa.rentados_asignacion.asignar',compact('equipo','personas'));
    }

    public function guardar_asignado(Request $request){
        if ($request->ajax()) {
            if (RentadoAsignado::create($request->all())) {
                $personas = RentadoAsignado::get();
                $persona = $personas->last();
                return response()->json(['mensaje' => 'ok', 'personas' => $personas, 'id' => $persona->id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function asignar_guardar(Request $request){
        $asignacion = AsignacionRentado::create($request->all());
        $equipo = EquipoRentado::findOrFail($_POST['equipo_rentado_id']);
        $equipo_update['rentado_estado_id'] = 3;
        $equipo_update['observaciones'] = $_POST['observaciones_asignacion'];
        EquipoRentado::findOrFail($asignacion->equipo_rentado_id)->update($equipo_update);
        return redirect('admin/equipos_rentados')->with('mensaje', 'Asignación registrada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function verMeses($a){

        $f1 = new DateTime( $a[0] );
        $f2 = new DateTime( $a[1] );
       // obtener la diferencia de fechas
       $d = $f1->diff($f2);
       return  ( $d->y * 12 ) + $d->m;
    }
    public function devolver_asignado_proveedor(Request $request,$id){
        $equipo_update['rentado_estado_id'] = 2;
        $equipo_update['fecha_devolucion'] = date('Y-m-d');
        EquipoRentado::findOrFail($id)->update($equipo_update);
        return redirect('admin/equipos_rentados')->with('mensaje', 'Devolucion de equipo registrada exito');
    }

    public function devolver_asignadobodega(Request $request,$id){
        $asignacion = AsignacionRentado::findOrFail($id);
        $equipo = EquipoRentado::findOrFail($asignacion->equipo_rentado_id);
        $asignacion_update['fecha_devolucion'] = $request['fecha_devolucion'];
        AsignacionRentado::findOrFail($id)->update($asignacion_update);
        $equipo_update['rentado_estado_id'] = 1;
        if ($request['observaciones']!='N/A') {
            $equipo_update['observaciones'] = $equipo->observaciones .' - ' . $request['observaciones'];
        }
        EquipoRentado::findOrFail($asignacion->equipo_rentado_id)->update($equipo_update);
        return redirect('admin/equipos_rentados')->with('mensaje', 'Equipo devuelto a bodega con exito');
    }

}
