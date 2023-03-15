<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ImportUsuario;
use App\Models\Admin\Rol;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\Admin\UsuarioApi;
use App\Models\Empresa\Area;
use App\Models\Empresa\Centro;
use App\Models\Empresa\Contrato;
use App\Models\Personas\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

use Intervention\Image\ImageManagerStatic as Image;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::where('id', '>', '2')->get();
        return view('intranet.sistema.usuario.index', compact('roles'));
    }

    public function importar()
    {
        return view('intranet.sistema.usuario.importar');
    }

    public function import(Request $request){
        $file = $request->file('file');
        //$excel = Excel::load($file->getRealPath())->get();
        //$excel = Excel::import($request->file('file')->store('files'));
        //dd($excel);
        Excel::import(new ImportUsuario, $request->file('file')->store('files'));
        return redirect('admin/usuarios')->with(
            'mensaje',
            'Importacion hecha con éxito'
        );
    }

    public function cargar(Request $request,$id){
        if ($request->ajax()) {
            $id = $_GET['id'];
            $persona = Persona::with('tipos_docu')
                              ->with('usuario')
                              ->with('usuario.roles')
                              ->with('usuario.roles.carnets')
                              ->with('cargo')
                              ->with('cargo.area')
                              ->with('carrera')
                              ->with('carrera.facultad')
                              ->findOrFail($id);
            return $persona;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $tiposdocu = Tipo_Docu::orderBy('id')->get();
        $roles = Rol::where('id', '>', '2')
            ->orderBy('id')
            ->pluck('nombre', 'id')
            ->toArray();
        $areas = Area::get();
        $contratos = Contrato::get();
        if ($contratos->isEmpty($contratos)) {
            return redirect('admin/contratos-crear')->with('errores', 'Debe crear un tipo de contrato primero antes de crear un usuario');
        }
        $centros = Centro::get();
        if ($centros->isEmpty($centros)) {
            return redirect('admin/centros-crear')->with('errores', 'Debe crear un centro de costo primero antes de crear un usuario');
        }
        return view(
            'intranet.sistema.usuario.crear',
            compact('roles', 'tiposdocu','areas','contratos','centros')

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function guardar(Request $request)
    {
        //dd($request->all());
        $roles = $request->rol_id;
        //.........................................................................
        $nuevoUsuario['usuario'] = strtolower($request['nombre1'] . '.'. $request['apellido1'] );
        $nuevoUsuario['password'] = bcrypt(utf8_encode($request['identificacion']));
        $nuevoUsuario['camb_password'] = 1;
        $roles['estado'] = 1;
        $usuario = Usuario::create($nuevoUsuario);
        $usuario->roles()->sync($request->rol_id);
        //.........................................................................
        $newUser['id'] = $usuario->id;
        $newUser['name'] = strtolower($request['nombre1'] . '.'. $request['apellido1'] );
        $newUser['password'] = bcrypt(utf8_encode($request['identificacion']));
        $newUser['email'] = strtolower($request['email']);
        $usuario2 = UsuarioApi::create($newUser);
        //.........................................................................
        $nuevaPersona['id'] = $usuario->id;
        $nuevaPersona['docutipos_id'] = $request['docutipos_id'];
        $nuevaPersona['identificacion'] = $request['identificacion'];
        $nuevaPersona['nombre1'] = utf8_encode(ucwords($request['nombre1']));
        $nuevaPersona['nombre2'] = utf8_encode(ucwords($request['nombre2']));
        $nuevaPersona['apellido1'] = utf8_encode(ucwords($request['apellido1']));
        $nuevaPersona['apellido2'] = utf8_encode(ucwords($request['apellido2']));
        $nuevaPersona['telefono'] = $request['telefono'];
        $nuevaPersona['direccion'] = $request['direccion'];
        $nuevaPersona['email'] = strtolower($request['email']);
        $nuevaPersona['contrato_id'] = $request['contrato_id'];
        $nuevaPersona['centro_id'] = $request['centro_id'];
        $nuevaPersona['cargo_id'] = $request['cargo_id'];
        $nuevaPersona['asignacion'] = $request['asignacion'];
        $nuevaPersona['fecha_inicio'] = $request['fecha_inicio'];
        $nuevaPersona['fecha_retiro'] = $request['fecha_retiro'];
        $nuevaPersona['tiket'] = $request['tiket'];
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('foto')) {
            $ruta = Config::get('constantes.folder_img_usuarios');
            $ruta = trim($ruta);

            $foto = $request->foto;
            $imagen_foto = Image::make($foto);
            $nombrefoto = time() . $foto->getClientOriginalName();
            $imagen_foto->resize(400, 500);
            $imagen_foto->save($ruta . $nombrefoto, 100);
            $nuevaPersona['foto'] = $nombrefoto;
        }else{
            $nuevaPersona['foto'] = 'usuario-inicial.jpg';
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $persona = Persona::create($nuevaPersona);
        //.........................................................................
        return redirect('admin/usuarios')->with(
            'mensaje',
            'Usuario creado con exito'
        );
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
        $tiposdocu = Tipo_Docu::orderBy('id')->get();
        $roles = Rol::where('id', '>', 1)
            ->orderBy('id')
            ->pluck('nombre', 'id')
            ->toArray();
        $data = Usuario::findOrFail($id);
        return view(
            'intranet.sistema.usuario.editar',
            compact('data', 'roles', 'tiposdocu')
        );
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
        $actualizar_usuario['docutipos_id'] = $request['docutipos_id'];
        $actualizar_usuario['identificacion'] = $request['identificacion'];
        $actualizar_usuario['nombres'] = $request['nombres'];
        $actualizar_usuario['apellidos'] = $request['apellidos'];
        $actualizar_usuario['email'] = $request['email'];
        $actualizar_usuario['telefono'] = $request['telefono'];
        $roles = $request->rol_id;
        $roles['estado'] = 1;
        $usuario = Persona::findOrFail($id);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Persona::findOrFail($id)->update($actualizar_usuario);
        $usuario->update($actualizar_usuario);
        //-------------------------------------------
        return redirect('admin/usuario-index')->with(
            'mensaje',
            'Usuario Actualizado con exito'
        );
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

    public function cargar_usuarios_carreras(Request $request){
        if ($request->ajax()) {
            $id = $_GET['id'];
            $rol_id = $_GET['rol_id'];
                return Persona::with('carrera')->
            whereHas('usuario.roles', function ($p) use($rol_id) {
                $p->where('rol_id',$rol_id);
            })
            ->whereHas('carrera', function ($p) use($id) {
                $p->where('carrera_id', $id);
            })->get();
        }

    }


    public function cargar_usuarios_cargos(Request $request){
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Persona::whereHas('cargo', function ($p) use($id) {
                $p->where('cargo_id', $id);
            })->get();
        }

    }

}
