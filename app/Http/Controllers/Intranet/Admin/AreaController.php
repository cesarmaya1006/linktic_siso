<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Usuario;
use App\Models\Empresa\Area;
use App\Models\Empresa\RolesPermiso;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$usurio = Usuario::findOrFail(session('id_usuario'));
        //dd($usurio->roles[0]->toArray());
        $areas = Area::get();
        $menus = Menu::where('nombre','Areas')->get();
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
        return view('intranet.parametros.areas.index',compact('areas', 'permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('intranet.parametros.areas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Area::create($request->all());
        return redirect('admin/areas')->with(
            'mensaje',
            'Área creada con exito'
        );
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
        $area = Area::findOrFail($id);
        return view('intranet.parametros.areas.editar', compact('area'));
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
        Area::findOrFail($id)->update($request->all());
        return redirect('admin/areas')->with(
            'mensaje',
            'Área actualizada con exito'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar_old($id)
    {
        if (Area::destroy($id)) {
            return redirect('admin/areas')->with(
                'mensaje',
                'Área eliminada con exito'
            );
        } else {
            return redirect('admin/areas')->with(
                'errores',
                'El area no puede ser eliminada, existen recursos usando este elemento'
            );
        }
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Area::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
