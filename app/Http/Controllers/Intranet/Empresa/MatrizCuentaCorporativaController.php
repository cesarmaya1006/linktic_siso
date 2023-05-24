<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\CuentaCorporativa;
use App\Models\Empresa\MatrizCargo;
use App\Models\Empresa\MatrizCuentasCorporativa;
use Illuminate\Http\Request;

class MatrizCuentaCorporativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = MatrizCargo::get();
        //$cargos = MatrizCargo::orderBy('id')->pluck('cargo', 'id')->toArray();
        $cuentas = CuentaCorporativa::get();
        return view('intranet.empresa.matriz_cuentas_corporativas.index', compact('cargos','cuentas'));
    }

    public function asignacion(Request $request,$matriz_cargo_id,$cuenta_corporativa_id){
        $cargos = new MatrizCargo();
        $cargos->find($matriz_cargo_id)->cuentas_corporativas()->attach($cuenta_corporativa_id);
        return response()->json(['mensaje' => 'ok']);
    }

    public function desasignacion(Request $request,$matriz_cargo_id,$cuenta_corporativa_id){
        $cargos = new MatrizCargo();
        $cargos->find($matriz_cargo_id)->cuentas_corporativas()->detach($cuenta_corporativa_id);
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
