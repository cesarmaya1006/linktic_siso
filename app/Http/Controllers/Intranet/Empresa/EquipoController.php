<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Empresa\Equipo;
use App\Models\Empresa\Equipo2;
use App\Models\Empresa\GlpiInfocom;
use App\Models\Empresa\GlpiNotepads;
use App\Models\Empresa\RolesPermiso;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::get();
        $equiposGLPI = Equipo2::with('entidad')
            ->with('usuario')
            ->get();

        foreach ($equiposGLPI as $equipo) {
            $infoComps = GlpiInfocom::where('itemtype', 'Computer')
                ->where('items_id', $equipo->id)
                ->get();
            $notepads = GlpiNotepads::where('itemtype', 'Computer')
                ->where('items_id', $equipo->id)
                ->get();
            foreach ($infoComps as $infoComp) {
                if ($equipo->id == $infoComp->items_id) {
                    $equipo['fec_compra'] = $infoComp->buy_date;
                    $meses = $this->verMeses([
                        $infoComp->buy_date,
                        date('Y-m-d'),
                    ]);
                    $equipo['meses_uso'] = $meses;
                    $equipo['porcentaje'] = round(($meses * 100) / 60, 2);
                    $equipo['suppliers_id'] = $infoComp->suppliers_id;
                    $equipo['proveedor'] = $infoComp->proveedor->name ?? 'N/A';
                    break;
                }
            }
            foreach ($notepads as $item) {
                $equipo['centro_costo'] = $item->content ?? 'N/A';
                break;
            }
        }
        //dd($equiposGLPI->toArray());
        $menus = Menu::where('nombre','Equipos Propios')->get();
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
        return view('intranet.empresa.equipos.index',compact('equipos', 'equiposGLPI','permiso'));
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

    private function verMeses($a)
    {
        $f1 = new DateTime($a[0]);
        $f2 = new DateTime($a[1]);
        // obtener la diferencia de fechas
        $d = $f1->diff($f2);
        return $d->y * 12 + $d->m;
    }
}
