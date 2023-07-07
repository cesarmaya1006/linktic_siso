<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Empresa\Empleado;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\RolesPermiso;
use App\Models\Intranet\Empresa\DominioDaddy;
use Illuminate\Http\Request;

class DominioDaddyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dominios = DominioDaddy::get();
        $menus = Menu::where('nombre','Dominios GoDaddy')->get();
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

        return view('intranet.empresa.dominios_daddy.index', compact('dominios','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = CentroCosto::get();
        $empleados = Empleado::get();
        return view('intranet.empresa.dominios_daddy.create', compact('centros','empleados'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DominioDaddy::create($request->all());
        return redirect('dominiosDaddy')->with('mensaje', 'Dominio creado con exito');
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
    public function edit(Request $request, $id)
    {
        //
        DominioDaddy::findOrFail($id)->update($request->all());
        return redirect('dominiosDaddy')->with('mensaje', 'Dcominio de correo actualizado con exito');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pagos =  DominioDaddy::findOrFail($id);
        $centros = CentroCosto::get();
        $empleados = Empleado::get();
        return view('intranet.empresa.dominios_daddy.editar', compact('centros','empleados','pagos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
            if (DominioDaddy::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }

    }
}
