<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\GlpiOperatingSystem;
use App\Models\Empresa\MatrizCaracteristica;
use Illuminate\Http\Request;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristicas = MatrizCaracteristica::get();
        return view('intranet.empresa.caracteristicas.index', compact('caracteristicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $sistemas_operativos = GlpiOperatingSystem::get();
        return view('intranet.empresa.caracteristicas.crear' ,compact('sistemas_operativos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        MatrizCaracteristica::create($request->all());
        return Redirect('admin/matriz_caracteristicas')->with('mensaje', 'Característica creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $sistemas_operativos = GlpiOperatingSystem::get();
        $caracteristica = MatrizCaracteristica::findOrFail($id);
        return view('intranet.empresa.caracteristicas.editar' ,compact('sistemas_operativos','caracteristica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        MatrizCaracteristica::findOrFail($id)->update($request->all());
        return redirect('admin/matriz_caracteristicas')->with('mensaje', 'Característica actualizada con exito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (MatrizCaracteristica::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }


}
