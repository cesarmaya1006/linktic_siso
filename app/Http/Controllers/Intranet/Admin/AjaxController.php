<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\PermisoCargo;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function cargar_cargos(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Cargo::where('area_id', $id)->get();
        }
    }
    public function cargar_menu_permisos(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Menu::with(['permisos_cargo' => function ($query) use($id) {
                $query->where('cargo_id', $id);
            }])->where('menu_id','>',2)->get();
        }
    }
    public function modificar_menu_permisos(Request $request)
    {
        if ($request->ajax()) {
            if ($request->input('estado') == 1) {
                $permiso[$_POST['opcion']] = 1;
                $permiso_fin = PermisoCargo::findOrFail($_POST['id'])->update($permiso);
                return response()->json(['respuesta' => 'El permiso se asigno correctamente']);
            } else {
                $permiso[$_POST['opcion']] = 0;
                $permiso_fin = PermisoCargo::findOrFail($_POST['id'])->update($permiso);
                return response()->json(['respuesta' => 'El permiso se elimino correctamente']);
            }
        } else {
            abort(404);
        }
    }

}
