<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa\LicenciasAdministrada;
use App\Models\Admin\Menu;
use App\Models\Empresa\RolesPermiso;
use App\Models\Empresa\Empleado;


class LicenciasAdministradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licencias = LicenciasAdministrada::get();
        $menus = Menu::where('nombre','Licencias administradas')->get();
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
        return view('intranet.empresa.licencias_administradas.index', compact('licencias','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $empleados = Empleado::get();
        return view('intranet.empresa.licencias_administradas.crear',compact('empleados'));
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
        LicenciasAdministrada::create($request->all());
        return redirect('licencias_administradas')->with('mensaje','Asignación creada con exito');
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
        $empleados = Empleado::get();
        $licencia = LicenciasAdministrada::findOrFail($id);
        return view('intranet.empresa.licencias_administradas.editar', compact('licencia','empleados'));
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
        LicenciasAdministrada::findOrFail($id)->update($request->all());
        return redirect('licencias_administradas')->with('mensaje', 'Asignación actualizada con exito');
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
            if (LicenciasAdministrada::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
