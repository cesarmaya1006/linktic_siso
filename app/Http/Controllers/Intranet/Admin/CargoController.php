<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Empresa\Area;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\PermisoCargo;
use App\Models\Empresa\RolesPermiso;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::get();
        $menus = Menu::where('nombre','Cargos')->get();
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
        return view('intranet.parametros.cargos.index', compact('cargos','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $areas = Area::get();
        return view('intranet.parametros.cargos.crear', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $cargo = Cargo::create($request->all());
        $menus = Menu::where('menu_id','>',2)->get();
        foreach ($menus as $menu) {
            $nuevosPermisos['cargo_id'] = $cargo->id;
            $nuevosPermisos['menu_id'] = $menu->id;
            $nuevosPermisos['listar'] = 0;
            $nuevosPermisos['buscar'] = 0;
            $nuevosPermisos['guardar'] = 0;
            $nuevosPermisos['actualizar'] = 0;
            $nuevosPermisos['borrar'] = 0;
            PermisoCargo::create($nuevosPermisos);
        }
        return redirect('admin/cargos')->with('mensaje', 'Cargo creado con exito');
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
        $cargo = Cargo::findOrFail($id);
        $areas = Area::get();
        return view('intranet.parametros.cargos.editar', compact('cargo', 'areas'));
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
        Cargo::findOrFail($id)->update($request->all());
        return redirect('admin/cargos')->with('mensaje', 'Cargo actualizado con exito');
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
            if (PermisoCargo::where('cargo_id',$id)->delete() && Cargo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
