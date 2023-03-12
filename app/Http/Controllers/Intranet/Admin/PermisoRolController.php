<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Permiso;
use App\Models\Admin\Rol;
use App\Models\Empresa\Area;
use App\Models\Empresa\Cargo;
use Illuminate\Http\Request;

class PermisoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::with('cargos')->with('cargos.menus')->with('cargos.permisos_cargo')->get();
        $menus = Menu::where('menu_id','>',2)->get();
        return view('intranet.sistema.permiso-rol.index', compact('areas', 'menus'));
    }

    public function guardar(Request $request)
    {
        if ($request->ajax()) {
            $permisos = new Permiso();
            if ($request->input('estado') == 1) {
                $permisos->find($request->input('permiso_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El permiso se asigno correctamente']);
            } else {
                $permisos->find($request->input('permiso_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El permiso se elimino correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
