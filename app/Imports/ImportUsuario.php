<?php

namespace App\Imports;

use App\Models\Admin\Cargo;
use App\Models\Admin\Carrera;
use App\Models\Admin\Rol;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\Admin\UsuarioApi;
use App\Models\Personas\Persona;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportUsuario implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $roles = Rol::where('nombre', $row[0])->get();
            $rol_id = [];
            foreach ($roles as $rol) {
                $rol_id[] = $rol['id'];
            }
            $nuevoUsuario['usuario'] = $row[3];
            $nuevoUsuario['password'] = bcrypt($row[4]);
            $nuevoUsuario['camb_password'] = '0';
            $usuario = Usuario::create($nuevoUsuario);
            //-----------------------------------------------------------------------
            $newUser['id'] = $usuario ->id;
            $newUser['name'] = $row[13];
            $newUser['password'] = bcrypt($row[4]);
            $newUser['email'] = $row[13];
            $newUser['created_at']  = Carbon::now()->format('Y-m-d H:i:s');
            $usuario2 = UsuarioApi::create($newUser);
            //-----------------------------------------------------------------------
            $usuario->roles()->sync($rol_id);

            $docuTipos = Tipo_Docu::where('abreb_id',$row[5])->get();
            foreach ($docuTipos as $docuTipo) {
                $docutipos_id = $docuTipo['id'];
            }

            $nuevaPersona['id'] = $usuario->id;
            $nuevaPersona['docutipos_id'] = $docutipos_id;
            if ($rol_id[0]==3) {
                $cargos = Cargo::where('cargo',$row[1])->get();
                foreach ($cargos as $cargo) {
                    $cargo_id = $cargo['id'];
                }
                $nuevaPersona['cargo_id'] = $cargo_id;
                $nuevaPersona['carrera_id']=null;
            }else{
                $carreras = Carrera::where('carrera',$row[2])->get();
                foreach ($carreras as $carrera) {
                    $carrera_id = $carrera['id'];
                }
                $nuevaPersona['cargo_id'] =null;
                $nuevaPersona['carrera_id'] = $carrera_id;
            }
            $nuevaPersona['identificacion'] = $row[6];
            $nuevaPersona['nombre1'] = $row[7];
            $nuevaPersona['nombre2'] = $row[8];
            $nuevaPersona['apellido1'] = $row[9];
            $nuevaPersona['apellido2'] = $row[10];
            $nuevaPersona['telefono'] = $row[11];
            $nuevaPersona['direccion'] = $row[12];
            $nuevaPersona['email'] = $row[13];
            $nuevaPersona['foto'] = $row[14];
            $nuevaPersona['vigencia'] = $row[15];
            $nuevaPersona['estado'] = 1;
            $persona = Persona::create($nuevaPersona);
        }
    }
}
