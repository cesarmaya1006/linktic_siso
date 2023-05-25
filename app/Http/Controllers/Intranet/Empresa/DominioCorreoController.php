<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Dominio;
use App\Models\Intranet\Empresa\DominioCorreo;
use Illuminate\Http\Request;

class DominioCorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $dominios = DominioCorreo::get();
        return view('intranet.empresa.dominios_correos.index', compact('dominios'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intranet.empresa.dominios_correos.crear');   
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

        DominioCorreo::create($request->all());
        return redirect('dominios')->with('mensaje', 'Dominio creado con exito');
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
        
       
        DominioCorreo::findOrFail($id)->update($request->all());
        return redirect('dominios')->with('mensaje', 'Dcominio de correo actualizado con exito');
    
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
        $dominio = DominioCorreo::findOrFail($id);
       

        return view('intranet.empresa.dominios_correos.editar', compact('dominio'));
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
            if (DominioCorreo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
       
    }    
}
