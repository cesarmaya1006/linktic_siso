<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\SubCentroCosto;
use Illuminate\Http\Request;

class SubCentrosCostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //$usurio = Usuario::findOrFail(session('id_usuario'));
        //dd($usurio->roles[0]->toArray());
        $sub_centros = SubCentroCosto::get();
        return view('intranet.parametros.sub_centros.index', compact('sub_centros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $centros = CentroCosto::get();
        return view('intranet.parametros.sub_centros.crear',compact('centros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        SubCentroCosto::create($request->all());
        return redirect('admin/sub_centros_costo')->with('mensaje', 'Sub - Centro de costo creado con exito');
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
        $centros = CentroCosto::get();
        $sub_centro = SubCentroCosto::findOrFail($id);
        return view('intranet.parametros.sub_centros.editar', compact('sub_centro','centros'));
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
        SubCentroCosto::findOrFail($id)->update($request->all());
        return redirect('admin/sub_centros_costo')->with('mensaje', 'Sub - Centro de costo actualizado con exito');
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
            if (SubCentroCosto::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function cargar_concecutivo(Request $request)
    {
        if ($request->ajax()) {
            $consecutivos = SubCentroCosto::where('centro_costo_id',$_GET['id'])->get();
            $consecutivo=1;
            foreach ($consecutivos as $item) {
                $consecutivo++;
            }
            return response()->json(['consecutivo' => $consecutivo]);
        } else {
            abort(404);
        }
    }
}
