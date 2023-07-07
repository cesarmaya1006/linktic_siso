<?php

namespace App\Http\Controllers\Intranet\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Empresa\CentroCosto;
use App\Models\Empresa\EquipoRentado;
use App\Models\Empresa\ProveedorRentado;
use App\Models\Empresa\RentadoEstado;
use App\Models\Empresa\RentadoResponsable;
use App\Models\Empresa\RentadoTipo;
use App\Models\Empresa\RolesPermiso;
use App\Models\Empresa\SubCentroCosto;
use DateTime;
use Illuminate\Http\Request;

class EquiposRentadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentados = EquipoRentado::get();
        foreach ($rentados as $equipo) {
            $equipo_asignado = $equipo->asignaciones->last();
            if ($equipo->rentado_estado_id == 1||$equipo->rentado_estado_id == 3) {
                $fechaUso = date('Y-m-d');
                $meses = $this->verMeses(array($equipo->fecha_entrega,$fechaUso));
                $equipo['meses_uso'] = $meses;
            }else{
                if ($equipo->fecha_devolucion!=null) {
                    $fechaUso = $equipo->fecha_devolucion;
                    $meses = $this->verMeses(array($equipo->fecha_entrega,$fechaUso));
                    $equipo['meses_uso'] = $meses;
                } else {
                    $equipo['meses_uso'] = 'Sin Fecha de devolución';
                }

            }
            if ($equipo_asignado!=null) {
                $equipo['fecha_asignacion'] = $equipo_asignado->fecha_asignacion;
                if ($equipo->rentado_estado_id == 3 && $equipo_asignado->fecha_devolucion==null) {
                    $fechaUso = date('Y-m-d');
                    $meses = $this->verMeses(array($equipo_asignado->fecha_asignacion,$fechaUso));
                    $equipo['meses_uso_renta'] = $meses;
                } else {
                    if ($equipo_asignado->fecha_devolucion!=null) {
                        $fechaUso = $equipo_asignado->fecha_devolucion;
                        $meses = $this->verMeses(array($equipo_asignado->equipo->fecha_entrega,$fechaUso));
                        $equipo['meses_uso_renta'] = $meses;
                    } else {
                        $equipo['meses_uso_renta'] = 'Sin Fecha de devolución';
                    }
                }
            } else {
                $equipo['meses_uso_renta'] = '---';
                $equipo['fecha_asignacion'] = '---';

            }


        }

        $menus = Menu::where('nombre','Equipos rentados')->get();
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

        return view('intranet.empresa.rentados.index', compact('rentados','permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $proveedores = ProveedorRentado::get();
        $centros_costos = CentroCosto::get();
        $centros = CentroCosto::get();
        $sub_centros = SubCentroCosto::get();
        $responsables = RentadoResponsable::get();
        $tipos = RentadoTipo::get();
        $estados= RentadoEstado::get();
        return view('intranet.empresa.rentados.crear',compact('proveedores','centros_costos' ,'centros' ,'sub_centros' ,'responsables' ,'tipos' ,'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        EquipoRentado::create($request->all());
        return redirect('admin/equipos_rentados')->with('mensaje', 'Equipo registrado con exito');
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
        $proveedores = ProveedorRentado::get();
        $centros_costos = CentroCosto::get();
        $centros = CentroCosto::get();
        $sub_centros = SubCentroCosto::get();
        $responsables = RentadoResponsable::get();
        $tipos = RentadoTipo::get();
        $equipo = EquipoRentado::findOrFail($id);
        return view('intranet.empresa.rentados.editar', compact('equipo','proveedores' ,'centros_costos' ,'centros' ,'sub_centros' ,'responsables' ,'tipos' ));
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
        EquipoRentado::findOrFail($id)->update($request->all());
        return redirect('admin/equipos_rentados')->with('mensaje', 'Equipo actualizado con exito');
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
            if (EquipoRentado::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    private function verMeses($a){

        $f1 = new DateTime( $a[0] );
        $f2 = new DateTime( $a[1] );
       // obtener la diferencia de fechas
       $d = $f1->diff($f2);
       return  ( $d->y * 12 ) + $d->m;
    }

    public function guardar_proveedor(Request $request){
        if ($request->ajax()) {
            if (ProveedorRentado::create($request->all())) {
                $proveedores = ProveedorRentado::get();
                $proveedor = $proveedores->last();
                return response()->json(['mensaje' => 'ok', 'proveedores' => $proveedores, 'id' => $proveedor->id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function guardar_centro(Request $request){
        if ($request->ajax()) {
            if (CentroCosto::create($request->all())) {
                $centros = CentroCosto::get();
                $centro = $centros->last();
                return response()->json(['mensaje' => 'ok', 'centros' => $centros, 'id' => $centro->id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function guardar_sub_centro(Request $request){
        if ($request->ajax()) {
            if (SubCentroCosto::create($request->all())) {
                $sub_centros = SubCentroCosto::get();
                $sub_centro = $sub_centros->last();
                return response()->json(['mensaje' => 'ok', 'sub_centros' => $sub_centros, 'id' => $sub_centro->id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function cargar_subcentro(Request $request){

        if ($request->ajax()) {
            return SubCentroCosto::where('centro_costo_id',$_GET['id'])->get();
        } else {
            abort(404);
        }
    }

    public function guardar_responsable(Request $request){
        if ($request->ajax()) {
            if (RentadoResponsable::create($request->all())) {
                $responsables = RentadoResponsable::get();
                $responsable = $responsables->last();
                return response()->json(['mensaje' => 'ok', 'responsables' => $responsables, 'id' => $responsable->id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function guardar_tipo(Request $request){
        if ($request->ajax()) {
            if (RentadoTipo::create($request->all())) {
                $tipos = RentadoTipo::get();
                $tipo = $tipos->last();
                return response()->json(['mensaje' => 'ok', 'tipos' => $tipos, 'id' => $tipo->id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
