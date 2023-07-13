<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Permiso;
use App\Models\Admin\Rol;
use App\Models\Empresa\Area;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\RolesPermiso;
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
        $menus = Menu::where('url','<>','#')->get();
        $roles = Rol::where('id','>',1)->get();
        foreach ($roles as $rol) {
            foreach ($menus as $menu) {
               $rolMenusPermisos = RolesPermiso::where('rol_id',$rol->id)->where('menu_id',$menu->id)->get();
               if ($rolMenusPermisos->count()==0) {
                $nuevoPermiso['rol_id'] = $rol->id;
                $nuevoPermiso['menu_id'] = $menu->id;
                RolesPermiso::create($nuevoPermiso);
               }
            }
        }

        return view('intranet.sistema.permiso-rol.index', compact('menus','roles'));
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
    public function data(Request $request)
    {
        if ($request->ajax()) {
            return RolesPermiso::where('rol_id', $_GET['rol_id'])->get();
        } else {
            abort(404);
        }
    }
    public function cambio_permiso(Request $request, $id){
        if ($request->ajax()) {
            $permiso_actualizar[$_POST['opcion']] = $_POST['valor'];
            if (RolesPermiso::findOrFail($id)->update($permiso_actualizar)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function aplicar_permisos(Request $request){
        if ($request->ajax()) {
            $data = json_decode(stripslashes($_POST['info']));
            foreach ($data as $item) {
                $permiso_act[$item->opcion] = $item->valor;
                RolesPermiso::findOrFail($item->id)->update($permiso_act);
            }
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }

    }
}
