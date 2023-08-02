<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPagoCorreo;
use App\Models\Admin\Menu;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\RolesPermiso;
use App\Models\Intranet\Empresa\DominioCorreo;
use App\Models\Intranet\Empresa\PagoCorreo;
use Illuminate\Http\Request;
const MESES = [
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'septiembre',
    10 => 'octubre',
    11 => 'Noviembre',
    12 => 'Diciembre',
];

class PagoCorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagos = PagoCorreo::get();
        $dominios = DominioCorreo::get();
        $menus = Menu::where('nombre', 'Correos corporativos')->get();
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

        return view(
            'intranet.empresa.pagos_correo_corporativo.index',
            compact('pagos', 'permiso')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = CentroCosto::get();
        $dominios = DominioCorreo::get();
        return view(
            'intranet.empresa.pagos_correo_corporativo.create',
            compact('centros', 'dominios')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionPagoCorreo $request)
    {
        PagoCorreo::create($request->all());
        return redirect('pagos')->with('mensaje', 'Correo creado con exito');
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

        PagoCorreo::findOrFail($id)->update($request->all());
        return redirect('pagos')->with(
            'mensaje',
            'Empleado actualizado con exito'
        );
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
        $pagos = PagoCorreo::findOrFail($id);
        $centros = CentroCosto::get();
        $dominios = DominioCorreo::get();
        return view(
            'intranet.empresa.pagos_correo_corporativo.editar',
            compact('pagos', 'centros', 'dominios')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if (PagoCorreo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
