<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Models\Empresa\Empleado;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEmpleado;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\Contrato;
use App\Models\Empresa\Empresa;
use App\Models\Empresa\Gestiona;
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
    {   $empleados = Empleado::where('estado','!=','Retirado')->get();
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
        return view('intranet.empresa.empleados.editar', compact('empleado','gestiones','contratos','centros','empresas'));
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
}
