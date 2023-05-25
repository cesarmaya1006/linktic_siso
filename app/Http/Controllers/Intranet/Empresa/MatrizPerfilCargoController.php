<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\MatrizCargo;
use App\Models\Empresa\MatrizPerfi;
use Illuminate\Http\Request;

class MatrizPerfilCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = MatrizCargo::get();
        $perfiles = MatrizPerfi::get();
        return view('intranet.empresa.matriz_cargos_perfil.index', compact('cargos','perfiles'));
    }

    public function asignacion(Request $request,$matriz_cargo_id,$matriz_perfi_id){
        $cargos = new MatrizCargo();
        $cargos->find($matriz_cargo_id)->matriz_perfil()->attach($matriz_perfi_id);
        return response()->json(['mensaje' => 'ok']);
    }

    public function desasignacion(Request $request,$matriz_cargo_id,$matriz_perfi_id){
        $cargos = new MatrizCargo();
        $cargos->find($matriz_cargo_id)->matriz_perfil()->detach($matriz_perfi_id);
        return response()->json(['mensaje' => 'ok']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}