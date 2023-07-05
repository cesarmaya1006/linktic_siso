<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Intranet\Empresa\Correo;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\RolesPermiso;
use App\Models\Intranet\Empresa\DominioCorreo;
use Illuminate\Http\Request;



class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $correos = Correo::get();
        $dominios = DominioCorreo::get();
        $menu_id = 43;
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

        return view('intranet.empresa.correos.index', compact('correos','dominios','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $centros = CentroCosto::get();
        $dominios = DominioCorreo::get();
        return view('intranet.empresa.correos.create', compact('centros','dominios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costoPesos = $request['costo_dolares'] * $request['trm'];
        $request['costo_pesos'] = $costoPesos;


        Correo::create($request->all());
        return redirect('correos')->with('mensaje', 'Correo creado con exito');
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

        $costoPesos = $request['costo_dolares'] * $request['trm'];
        $request['costo_pesos'] = $costoPesos;

        Correo::findOrFail($id)->update($request->all());
        return redirect('correos')->with('mensaje', 'Empleado actualizado con exito');

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
        //
        $correos = Correo::findOrFail($id);
        $centros = CentroCosto::get();
        $dominios = DominioCorreo::get();

        $correos->fecha_de_eliminacion = date('Y-m-d',strtotime( $correos->fecha_de_eliminacion));
        $correos->fecha_de_creacion = date('Y-m-d',strtotime( $correos->fecha_de_creacion));

        return view('intranet.empresa.correos.editar', compact('correos','centros','dominios'));
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
            if (Correo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }

    }
}
