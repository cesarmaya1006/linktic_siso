<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Models\Empresa\Empleado;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEmpleado;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\Contrato;
use App\Models\Empresa\CuentaCorporativa;
use App\Models\Empresa\EmpleadoEquipoRentado;
use App\Models\Empresa\EmpleadoImpresora;
use App\Models\Empresa\EmpleadoMonitores;
use App\Models\Empresa\EmpleadoOtro;
use App\Models\Empresa\Empresa;
use App\Models\Empresa\Equipo2;
use App\Models\Empresa\EquipoRentado;
use App\Models\Empresa\Gestiona;
use App\Models\Empresa\GlpiMonitor;
use App\Models\Empresa\GlpiPrinter;
use App\Models\Empresa\Licencia;
use App\Models\Empresa\RentadoEstado;
use App\Models\Empresa\Retiro;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::where('estado','!=','Retirado')->get();
        foreach ($empleados as $empleado) {
            $ids_equiposPropios =[];
            foreach ($empleado->equipospropios->where('glpi_computers_id', '!=', null) as $equipoPropio) {
                $ids_equiposPropios[]=$equipoPropio->glpi_computers_id;
            }
            $equipos_propios = Equipo2::whereIn('id', $ids_equiposPropios)->get();
            $empleado['equipos_propios'] = $equipos_propios;
        }
        return view('intranet.empresa.empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $gestiones = Gestiona::get();
        $contratos = Contrato::get();
        $centros = CentroCosto::get();
        $empresas = Empresa:: get();
        return view('intranet.empresa.empleados.crear',compact('gestiones','contratos','centros','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEmpleado $request)
    {
        Empleado::create($request->all());
        return redirect('admin/empleados')->with('mensaje', 'Empleado creado con exito');
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
    public function editar($id)
    {
        $gestiones = Gestiona::get();
        $contratos = Contrato::get();
        $centros = CentroCosto::get();
        $empresas = Empresa:: get();
        $empleado = Empleado::findOrFail($id);
        $cuentas = CuentaCorporativa::get();
        $licencias = Licencia::get();
        //---
        $ids_equiposPropios =[];
        foreach ($empleado->equipospropios->where('glpi_computers_id', '!=', null) as $equipoPropio) {
            $ids_equiposPropios[]=$equipoPropio->glpi_computers_id;
        }
        $equipos_propios = Equipo2::whereIn('id', $ids_equiposPropios)->get();
        //------
        $ids_impresoras =[];
        foreach ($empleado->impresoras as $impresora) {
            $ids_impresoras[]=$impresora->glpi_printers_id;
        }
        $impresoras = GlpiPrinter::whereIn('id', $ids_impresoras)->get();
        //------
        $ids_monitores =[];
        foreach ($empleado->monitores as $monitor) {
            $ids_monitores[]=$monitor->glpi_monitors_id;
        }
        $monitores = GlpiMonitor::whereIn('id', $ids_monitores)->get();
        $otros  = EmpleadoOtro::where('estado','1')->get();
        //------
        return view('intranet.empresa.empleados.editar', compact('empleado','gestiones','contratos','centros','empresas','cuentas','licencias','equipos_propios','impresoras','monitores','otros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        Empleado::findOrFail($id)->update($request->all());
        return redirect('admin/empleados')->with('mensaje', 'Empleado actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Empleado::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function retirar_empleado($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('intranet.empresa.empleados.retirar',compact('empleado'));
    }
    public function retiro_empleado(Request $request, $id){
        if ($request->ajax()) {
            if (Retiro::create($request->all())) {
                Empleado::destroy($id);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }

    }
    public function retiro_confirmacion(){
        return redirect('admin/empleados')->with('mensaje', 'Empleado retirado con exito');
    }

    public function equipos_rentados_asignar($id){
        $empleado = Empleado::findOrFail($id);
        $equipos =  EquipoRentado::doesntHave("usuariosrentados")->get();
        return view('intranet.empresa.empleados.equipos_rentados', compact('empleado','equipos'));
    }
    public function impresoras_asignar($id){
        $empleado = Empleado::findOrFail($id);
        $ids_impresoras =[];
        $impresoras_glpi = EmpleadoImpresora::get();
        foreach ($impresoras_glpi as $impresora) {
            $ids_impresoras[]=$impresora->glpi_printers_id;
        }
        $impresoras = GlpiPrinter::whereNotIn('id', $ids_impresoras)->get();
        return view('intranet.empresa.empleados.impresoras', compact('empleado','impresoras'));
    }

    public function monitores_asignar($id){
        $empleado = Empleado::findOrFail($id);
        $ids_monitores =[];
        $monitores_glpi = EmpleadoMonitores::get();
        foreach ($monitores_glpi as $monitor) {
            $ids_monitores[]=$monitor->glpi_monitors_id;
        }
        $monitores = GlpiMonitor::whereNotIn('id', $ids_monitores)->get();
        return view('intranet.empresa.empleados.monitores', compact('empleado','monitores'));
    }

    public function otros_asignar($id){
        $empleado = Empleado::findOrFail($id);
        $estados = RentadoEstado::whereIn('id',[2,3])->get();
        return view('intranet.empresa.empleados.otros', compact('empleado','estados'));
    }

    public function otros_asignacion(Request $request,$id){
        if ($request->ajax()) {
            $otrosElementosUpdate['estado'] = '0';
            EmpleadoOtro::findOrfail($id)->update($otrosElementosUpdate);
            return response()->json(['mensaje' => 'ok']);
        } else {
            EmpleadoOtro::create($request->all());
            return redirect('admin/empleados/'.$request['empleado_id'].'/editar')->with('mensaje', 'Empleado creado con exito');
        }


    }

    public function equipos_propios_asignar($id){
        $empleado = Empleado::findOrFail($id);
        $ids_equiposPropios =[];
        $equiposPropios = EmpleadoEquipoRentado::where('glpi_computers_id', '!=', null)->get();
        foreach ($equiposPropios as $equipoPropio) {
            $ids_equiposPropios[]=$equipoPropio->glpi_computers_id;
        }
        $equipos = Equipo2::whereNotIn('id', $ids_equiposPropios)->get();
        return view('intranet.empresa.empleados.equipos_propios', compact('empleado','equipos'));
    }

    public function get_equipos_rentados(Request $request, $id){
        if ($request->ajax()) {
            $empleado = Empleado::findOrFail($id);
            return $empleado->equiposrentados;
        } else {
            abort(404);
        }
    }
    public function get_equipos_propios(Request $request, $id){
        $empleado = Empleado::findOrFail($id);
        $ids_equiposPropios =[];
        foreach ($empleado->equipospropios->where('glpi_computers_id', '!=', null) as $equipoPropio) {
            $ids_equiposPropios[]=$equipoPropio->glpi_computers_id;
        }
        return Equipo2::whereIn('id', $ids_equiposPropios)->get();
    }
    public function get_impresoras(Request $request, $id){
        $empleado = Empleado::findOrFail($id);
        $ids_impresoras =[];
        foreach ($empleado->impresoras as $impresora) {
            $ids_impresoras[]=$impresora->glpi_printers_id;
        }
        return GlpiPrinter::whereIn('id', $ids_impresoras)->get();
    }

    public function get_monitores(Request $request, $id){
        $empleado = Empleado::findOrFail($id);
        $ids_monitores =[];
        foreach ($empleado->monitores as $monitor) {
            $ids_monitores[]=$monitor->glpi_monitors_id;
        }
        return GlpiMonitor::with('fabricante')->with('modeloMonitor')->whereIn('id', $ids_monitores)->get();
    }
    public function get_otros(Request $request, $id){
        if ($request->ajax()) {
            $empleado = Empleado::findOrFail($id);
            return $empleado->otros;
        } else {
            abort(404);
        }
    }


    public function get_cuentas_corporativas(Request $request, $id){
        if ($request->ajax()) {
            $empleado = Empleado::findOrFail($id);
            return $empleado->cuentas_corporativas;
        } else {
            abort(404);
        }
    }
    public function get_licencias_corporativas(Request $request, $id){
        if ($request->ajax()) {
            $empleado = Empleado::findOrFail($id);
            return $empleado->licencias_corporativas;
        } else {
            abort(404);
        }

    }
    public function asignar_licencias(Request $request, $empleado_id,$licencia_id){
        if ($request->ajax()) {
            $empleados = new Empleado();
            if ($request->input('valor') == 1) {
                $empleados->find($empleado_id)->licencias_corporativas()->attach($licencia_id);
                return response()->json(['mensaje' => 'ok']);
            } else {
                $empleados->find($empleado_id)->licencias_corporativas()->detach($licencia_id);
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function equipos_rentados_asignacion(Request $request,$empleado_id,$equipo_rentado_id){
        if ($request->ajax()) {
            $empleados = new Empleado();
            if ($request->input('valor') == 1) {
                $empleados->find($empleado_id)->equiposrentados()->attach($equipo_rentado_id);
                return response()->json(['mensaje' => 'ok']);
            } else {
                $empleados->find($empleado_id)->equiposrentados()->detach($equipo_rentado_id);
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function equipos_propios_asignacion(Request $request,$empleado_id,$glpi_computers_id){
        if ($request->ajax()) {
            $empleados = new Empleado();
            if ($request->input('valor') == 1) {
                $empleado_equipo_rentados_new['empleado_id'] = $empleado_id;
                $empleado_equipo_rentados_new['glpi_computers_id'] = $glpi_computers_id;
                EmpleadoEquipoRentado::create($empleado_equipo_rentados_new);
                return response()->json(['mensaje' => 'ok']);
            } else {
                $empleadosEquipos = EmpleadoEquipoRentado::where('empleado_id',$empleado_id)->where('glpi_computers_id',$glpi_computers_id)->get();
                foreach ($empleadosEquipos as $item) {
                    $id = $item->id;
                }
                EmpleadoEquipoRentado::destroy($id);
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function impresoras_asignacion(Request $request,$empleado_id,$glpi_printers_id){
        if ($request->ajax()) {
            if ($request->input('valor') == 1) {
                $empleado_impresoras['empleado_id'] = $empleado_id;
                $empleado_impresoras['glpi_printers_id'] = $glpi_printers_id;
                EmpleadoImpresora::create($empleado_impresoras);
                return response()->json(['mensaje' => 'ok']);
            } else {
                $empleado_impresoras = EmpleadoImpresora::where('empleado_id',$empleado_id)->where('glpi_printers_id',$glpi_printers_id)->get();
                foreach ($empleado_impresoras as $item) {
                    $id = $item->id;
                }
                EmpleadoImpresora::destroy($id);
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function monitores_asignacion(Request $request,$empleado_id,$glpi_monitors_id){
        if ($request->ajax()) {
            if ($request->input('valor') == 1) {
                $empleado_monitores['empleado_id'] = $empleado_id;
                $empleado_monitores['glpi_monitors_id'] = $glpi_monitors_id;
                EmpleadoMonitores::create($empleado_monitores);
                return response()->json(['mensaje' => 'ok']);
            } else {
                $empleado_monitores = EmpleadoMonitores::where('empleado_id',$empleado_id)->where('glpi_monitors_id',$glpi_monitors_id)->get();
                foreach ($empleado_monitores as $item) {
                    $id = $item->id;
                }
                EmpleadoMonitores::destroy($id);
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
