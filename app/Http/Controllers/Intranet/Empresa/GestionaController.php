<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Models\Empresa\Gestiona;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $gestiones = Gestiona::get();
        return view('intranet.parametros.gestion.index', compact('gestiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('intranet.parametros.gestion.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Gestiona::create($request->all());
        return redirect('admin/gestion')->with('mensaje', 'Gestión creada con exito');
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
        $gestion = Gestiona::findOrFail($id);
        return view('intranet.parametros.gestion.editar', compact('gestion'));
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
        Gestiona::findOrFail($id)->update($request->all());
        return redirect('admin/gestion')->with('mensaje', 'Gestión actualizada con exito');
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
            if (Gestiona::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
