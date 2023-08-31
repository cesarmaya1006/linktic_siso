<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa\AsignacionEquipo;
use App\Models\Admin\Menu;
use App\Models\Empresa\RolesPermiso;
use App\Models\Empresa\CentroCosto;


class AsignacionEquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciones = AsignacionEquipo::get();
        $menus = Menu::where('nombre','Asignación de equipos')->get();
        $menu_id = $menus[0]['id'];
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
        return view('intranet.empresa.asignacion_equipos.index', compact('asignaciones','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $centros = CentroCosto::get();
        return view('intranet.empresa.asignacion_equipos.crear',compact('centros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //dd($request->all());
        AsignacionEquipo::create($request->all());
        return redirect('asignacion_equipos')->with('mensaje','Asignación creada con exito');
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
        $centros = CentroCosto::get();
        $asignacion = AsignacionEquipo::findOrFail($id);
        return view('intranet.empresa.asignacion_equipos.editar', compact('asignacion','centros'));
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
        AsignacionEquipo::findOrFail($id)->update($request->all());
        return redirect('asignacion_equipos')->with('mensaje', 'Asignación actualizada con exito');
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
            if (AsignacionEquipo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
