<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\MatrizCargo;
use Illuminate\Http\Request;

class MatrizCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = MatrizCargo::get();
        return view('intranet.empresa.matriz_cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {

        return view('intranet.empresa.matriz_cargos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        MatrizCargo::create($request->all());
        return redirect('admin/matriz_cargos')->with('mensaje', 'Cargo creado con exito');
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
        $cargo = MatrizCargo::findOrFail($id);
        return view('intranet.empresa.matriz_cargos.editar', compact('cargo'));
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
        MatrizCargo::findOrFail($id)->update($request->all());
        $cargos = MatrizCargo::orderBy('id')->get();
        return redirect('admin/matriz_cargos')->with('mensaje', 'Cargo actualizado con exito')->with('cargos');
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
            if (MatrizCargo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}