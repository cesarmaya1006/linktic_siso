<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\CuentaCorporativa;
use App\Models\Empresa\Empleado;
use App\Models\Empresa\RolesPermiso;
use Illuminate\Http\Request;

class CuentaCorporativaController extends Controller
{
    public function index()
    {   $cuentas = CuentaCorporativa::get();
        $menu_id = 41;
        $rol_id = session('rol_id');
        if ($rol_id > 1) {
            $permisos = RolesPermiso::where('rol_id', $rol_id)
                ->where('menu_id', $menu_id)
                ->get();
            foreach ($permisos as $permiso_) {
                $permiso_id = $permiso_->id;
            }
            $permiso = RolesPermiso::findOrFail($permiso_id);
        } else {
            $permiso = null;
        }
        return view('intranet.empresa.cuentas.index', compact('cuentas','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('intranet.empresa.cuentas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        CuentaCorporativa::create($request->all());
        return redirect('admin/cuentas-corporativas')->with('mensaje', 'Cuenta Corporativa creada con exito');
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
        $cuenta = CuentaCorporativa::findOrFail($id);
        return view('intranet.empresa.cuentas.editar', compact('cuenta'));
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
        CuentaCorporativa::findOrFail($id)->update($request->all());
        return redirect('admin/cuentas-corporativas')->with('mensaje', 'Cuenta Corporativa actualizada con exito');
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
            if (CuentaCorporativa::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function asignar(Request $request, $empleado_id,$cuenta_corporativa_id){
        if ($request->ajax()) {
            $empleados = new Empleado();
            if ($request->input('valor') == 1) {
                $empleados->find($empleado_id)->cuentas_corporativas()->attach($cuenta_corporativa_id);
                return response()->json(['mensaje' => 'ok']);
            } else {
                $empleados->find($empleado_id)->cuentas_corporativas()->detach($cuenta_corporativa_id);
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
