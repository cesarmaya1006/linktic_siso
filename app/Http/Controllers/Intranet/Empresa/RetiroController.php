<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Models\Empresa\Retiro;
use App\Http\Controllers\Controller;
use App\Models\Empresa\Empleado;
use Illuminate\Http\Request;

class RetiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Retiro::get();
        return view('intranet.empresa.retiros.index', compact('empleados'));
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
     * @param  \App\Models\Empresa\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function show(Retiro $retiro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function edit(Retiro $retiro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retiro $retiro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa\Retiro  $retiro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retiro $retiro)
    {
        //
    }
}
