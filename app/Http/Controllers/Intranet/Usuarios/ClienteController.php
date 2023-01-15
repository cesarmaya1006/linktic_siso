<?php

namespace App\Http\Controllers\Intranet\Usuarios;

use App\Models\PQR\PQR;
use App\Models\PQR\Anexo;
use App\Models\PQR\Hecho;
use App\Mail\PQR_Radicada;
use App\Models\Admin\Pais;
use App\Models\PQR\Estado;
use App\Models\PQR\tipoPQR;
use App\Models\PQR\Peticion;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\SubMotivo;
use App\Models\Admin\Tipo_Docu;
use App\Models\Productos\Marca;
use App\Models\Personas\Persona;
use App\Http\Requests\ValidarPqr;
use App\Models\Admin\Departamento;
use App\Models\Productos\Producto;
use App\Models\Servicios\Servicio;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Productos\Categoria;
use App\Http\Controllers\Controller;
use App\Models\Productos\Referencia;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Fechas\FechasController;
use App\Models\Empleados\Empleado;
use App\Models\Empresas\Empresa;
use App\Models\PQR\AsignacionParticular;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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

    public function actualizar_datos()
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet/datos_personales.index', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));
    }

    public function cambiar_password()
    {
        return view('intranet/password.index');
    }

    public function cambiar_password_asistido($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('intranet/funcionarios/listado_usuarios.cambio_password_asistido', compact('usuario'));
    }

    public function consulta_politicas()
    {
        return view('intranet/consulta_politicas.index');
    }

    public function ayuda()
    {
        return view('intranet/ayuda.index');
    }


    //=========================================================================================================================
    public function download($id_tipo_pqr, $id_pqr)
    {
        $contenido = '';
        $num = 0;
        $tipo_pqr = tipoPQR::findOrFail($id_tipo_pqr);
        switch ($tipo_pqr->id) {
            case 1:
                $pqr = PQR::findOrFail($id_pqr);
                $contenido .= '<h4>Peticion</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Solicitud: ' . $peticion->justificacion . '<p>';
                }
                break;
            case 2:
                $pqr = PQR::findOrFail($id_pqr);
                $contenido .= '<h4>Queja</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Solicitud: ' . $peticion->justificacion . '<p>';
                }
                break;
            case 3:
                $pqr = PQR::findOrFail($id_pqr);
                $contenido .= '<h4>Reclamo</h4>';
                $contenido .= '<p>Lugar de adquisición del producto o servicio: ' . $pqr->adquisicion . '<p>';
                $contenido .= '<p>¿Su PQR es sobre un producto o servicio?: ' . $pqr->tipo . '<p>';
                $contenido .= '<p>Referencia: ' . $pqr->referencia_id . '<p>';
                $contenido .= '<p>No. Factura: ' . $pqr->factura . '<p>';
                $contenido .= '<p>Fecha de factura: ' . $pqr->fecha_factura . '<p>';
                $contenido .= '<p>Tipo de servicio: ' . $pqr->servicio_id . '<p>';
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Motivo: ' . $peticion->motivo->sub_motivo . '</h4>';
                    // $contenido .= '<p>Sub - Categoría Motivo: ' . $peticion->motivo->sub_motivo . '<p>';
                    foreach ($peticion->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                    $contenido .= '<p>Solicitud: ' . $peticion->justificacion . '<p>';
                }
                break;
            case 4:
                $pqr = PQR::findOrFail($id_pqr);
                foreach ($pqr->consultas as $concepto) {
                    $num++;
                    $contenido .= '<h4>Concepto u opinion #' . $num . '</h4>';
                    $contenido .= '<p>Consulta:' . $concepto->consulta . '<p>';
                    foreach ($concepto->hechos as $hecho) {
                        $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                    }
                }
                break;
            case 5:
                $pqr = PQR::findOrFail($id_pqr);
                foreach ($pqr->solicitudes as $solicitud) {
                    $num++;
                    $contenido .= '<h4>Solicitud #' . $num . '</h4>';
                    $contenido .= '<p>Tipo de solicitud: ' . $solicitud->tiposolicitud . '<p>';
                    $contenido .= '<p>Datos personales objeto de la solicitud: ' . $solicitud->datossolicitud . '<p>';
                    $contenido .= '<p>Descripción de la solicitud: ' . $solicitud->descripcionsolicitud . '<p>';
                }
                break;

            case 6:
                $pqr = PQR::findOrFail($id_pqr);
                $contenido .= '<h4>Denuncia</h4>';
                $contenido .= '<p>Tipo de solicitud: ' . $pqr->solicitud . '</p>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                break;
            case 7:
                $pqr = PQR::findOrFail($id_pqr);
                $contenido .= '<h4>Felicitacion</h4>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                if ($pqr->sede_id) {
                    $contenido .= '<p>Sede: ' . $pqr->sede_id . '</p>';
                }
                $contenido .= '<p>Nombre de funcionario: ' . $pqr->nombre_funcionario . '</p>';
                $contenido .= '<p>Escriba sus felicitaciones: ' . $pqr->felicitacion . '</p>';
                break;

            case 8:
                $pqr = PQR::findOrFail($id_pqr);
                foreach ($pqr->peticiones as $peticion) {
                    $num++;
                    $contenido .= '<h4>Petición #' . $num . '</h4>';
                    $contenido .= '<p>Tipo de petición: ' . $peticion->peticion . '<p>';
                    $contenido .= '<p>Identifique el documento o información requerida: ' . $peticion->indentifiquedocinfo . '<p>';
                    $contenido .= '<p>Justificaciones de su solicitud: ' . $peticion->justificacion . '<p>';
                }
                break;

            default:
                $pqr = PQR::findOrFail($id_pqr);
                $contenido .= '<h4>Sugerencia</h4>';
                foreach ($pqr->hechos as $hecho) {
                    $contenido .= '<p>Hecho: ' . $hecho->hecho . '<p>';
                }
                $contenido .= '<p>Escriba su sugerencia: ' . $pqr->sugerencia . '</p>';
                break;
        }
        if ($pqr->persona_id != null) {
            $data = [
                'nombre' => $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2,
                'correo' => $pqr->persona->email,
                'telefono' => $pqr->persona->telefono_celu,
                'tipo_doc' => $pqr->persona->tipos_docu->tipo_id,
                'identificacion' => $pqr->persona->identificacion,
                'fecha' => $pqr->created_at,
                'num_radicado' => $pqr->radicado,
                'contenido' => $contenido,
            ];
        } else {
            $data = [
                'nombre' => $pqr->empresa->razon_social,
                'correo' => $pqr->empresa->email,
                'telefono' => $pqr->empresa->telefono_celu,
                'tipo_doc' => $pqr->empresa->tipos_docu->tipo_id,
                'identificacion' => $pqr->empresa->identificacion,
                'fecha' => $pqr->created_at,
                'num_radicado' => $pqr->radicado,
                'contenido' => $contenido,
            ];
        }



        $pdf = PDF::loadView('intranet.usuarios.formato_pdf', $data);

        return $pdf->download('Registro de PQR.pdf');
    }

    public function asigacion_automatica($id)
    {
        $resp = '';
        $pqr = PQR::findOrFail($id);
        $asignaciones = AsignacionParticular::where('tipo', 'Permanente')->get();
        // **************************************************************************************************** */
        $resp = '';
        $respuesta['no_null'] = 0;
        $respuesta['asignacion_id'] = 0;
        foreach ($asignaciones as $asignacion) {
            $resp .= '      id Asignacion = ' . $asignacion->id . '***';
            $coincidencia = 0;
            $no_null = 0;
            if ($asignacion->tipo_pqr_id != null) {
                $no_null++;
                $resp .= 'tipo pqr:';
                if ($asignacion->tipo_pqr_id == $pqr->tipo_pqr_id) {
                    $coincidencia++;
                    $resp .= 'tipo pqr';
                }
            }
            $resp .= ',';
            if ($pqr->tipo != null) {
                if ($asignacion->prodserv != null) {
                    $no_null++;
                    $resp .= 'producto serv:';
                    if ($asignacion->prodserv == $pqr->tipo) {
                        $coincidencia++;
                        $resp .= 'producto serv';
                    }
                }
            }
            $resp .= ',';

            if ($asignacion->motivo_id != null) {
                $no_null++;
                $resp .= 'motivo:';
                if ($pqr->peticiones->count() > 0) {
                    foreach ($pqr->peticiones as $peticion) {
                        if ($peticion->motivo_sub_id != null) {
                            if ($asignacion->motivo_id == $peticion->motivo->motivo_id) {
                                $coincidencia++;
                                $resp .= 'motivo';
                            }
                        }
                    }
                }
            }
            $resp .= ',';
            if ($asignacion->motivo_sub_id != null) {
                $no_null++;
                $resp .= 'sub motivo:';
                if ($pqr->peticiones->count() > 0) {
                    foreach ($pqr->peticiones as $peticion) {
                        if ($peticion->motivo_sub_id != null) {
                            if ($asignacion->motivo_sub_id == $peticion->motivo_sub_id) {
                                $coincidencia++;
                                $resp .= 'sub motivo';
                            }
                        }
                    }
                }
            }
            $resp .= ',';

            if ($pqr->servicio_id != null) {
                if ($asignacion->servicio_id != null) {
                    $no_null++;
                    $resp .= 'servicio:';
                    if ($asignacion->servicio_id == $pqr->servicio_id) {
                        $coincidencia++;
                        $resp .= 'servicio';
                    }
                }
            }
            $resp .= ',';
            if ($pqr->referencia_id != null) {
                if ($asignacion->categoria_id != null) {
                    $no_null++;
                    $resp .= 'categoria:';
                    if ($asignacion->categoria_id == $pqr->referencia->marca->producto->categoria_id) {
                        $coincidencia++;
                        $resp .= 'categoria';
                    }
                }
                $resp .= ',';
                if ($asignacion->producto_id != null) {
                    $no_null++;
                    $resp .= 'producto:';
                    if ($asignacion->producto_id == $pqr->referencia->marca->producto_id) {
                        $coincidencia++;
                        $resp .= 'producto';
                    }
                }
                $resp .= ',';
                if ($asignacion->marca_id != null) {
                    $no_null++;
                    $resp .= 'marca:';
                    if ($asignacion->marca_id == $pqr->referencia->marca_id) {
                        $coincidencia++;
                        $resp .= 'marca';
                    }
                }
                $resp .= ',';
                if ($asignacion->referencia_id != null) {
                    $no_null++;
                    $resp .= 'referencia:';
                    if ($asignacion->referencia_id == $pqr->referencia_id) {
                        $coincidencia++;
                        $resp .= 'referencia';
                    }
                }
                $resp .= ',';
            }
            if ($asignacion->adquisicion != null) {
                $no_null++;
                $resp .= 'adquisicion:';
                if ($pqr->adquisicion != null) {
                    if ($asignacion->adquisicion == $pqr->adquisicion) {
                        $coincidencia++;
                        $resp .= 'adquisicion';
                    }
                }
            }
            $resp .= ',';
            if ($asignacion->palabra1 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra1);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra1);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            if ($asignacion->palabra2 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra2);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra2);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            if ($asignacion->palabra3 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra3);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra3);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            if ($asignacion->palabra4 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra4);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra4);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            $resp .= '  ------ salto ---  ';
            if ($no_null > 0 && $coincidencia > 0) {
                $resp .= 'no null->' . $no_null . '-coincidencia->' . $coincidencia . '   -   Asignacion->' . $asignacion->id . '   -   ';
                if ($coincidencia === $no_null) {
                    if ($no_null > $respuesta['no_null']) {
                        $respuesta['no_null'] = $no_null;
                        $respuesta['asignacion_id'] = $asignacion->id;
                    }
                }
            }
        }
        if ($respuesta['asignacion_id']) {
            $asignacion_final = AsignacionParticular::findOrFail($respuesta['asignacion_id']);
            if ($pqr->sede_id != null) {
                if ($pqr->sede_id == $asignacion_final->sede_id) {
                    $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $asignacion_final->sede_id)->get();
                } else {
                    if ($pqr->persona_id != null) {
                        $persona = Persona::findOrfail($pqr->persona_id);
                        foreach ($persona->municipio->departamento->sedes as $sede) {
                            $sede_id = $sede->id;
                        }
                        $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
                    } else {
                        $empresa = Empresa::findOrfail($pqr->empresa_id);
                        foreach ($empresa->municipio->departamento->sedes as $sede) {
                            $sede_id = $sede->id;
                        }
                        $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
                    }
                }
            } else {
                if ($pqr->persona_id != null) {
                    $persona = Persona::findOrfail($pqr->persona_id);
                    foreach ($persona->municipio->departamento->sedes as $sede) {
                        $sede_id = $sede->id;
                    }
                    $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
                } else {
                    $empresa = Empresa::findOrfail($pqr->empresa_id);
                    foreach ($empresa->municipio->departamento->sedes as $sede) {
                        $sede_id = $sede->id;
                    }
                    $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
                }
            }
            $max_pqr = 0;
            foreach ($empleados as $empleado) {
                $empleados_sel_max[] = ['cant' => $empleado->pqrs->count(), 'id' => $empleado->id];
            }
            $empleado_final = min($empleados_sel_max);
            $pqr_act['empleado_id'] = $empleado_final['id'];
            $pqr->update($pqr_act);
        }
        // **************************************************************************************************** */

    }
}
