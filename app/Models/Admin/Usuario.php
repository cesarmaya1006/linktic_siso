<?php

namespace App\Models\Admin;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $guarded = [];

    protected $hidden = ['password', 'remembre_token'];
    protected $cast = [
        'email_verified_at' => 'datetime',
    ];
    //==================================================================================
    public function roles()
    {
        return $this->belongsToMany(
            Rol::class,
            'usuario_rol',
            'usuario_id',
            'rol_id'
        );
    }
    //==================================================================================
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function dependencias()
    {
        return $this->hasMany(Dependencia::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function entradasinv()
    {
        return $this->hasMany(Inv_Entrada::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function salidasinv()
    {
        return $this->hasMany(Inv_Salida::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //==================================================================================
    public function setSession($roles)
    {
        Session::put([
            'id_usuario' => $this->id,
            'usuario' => $this->usuario,
        ]);
        if ($this->persona) {
            Session::put([
                'foto' => $this->persona->foto,
            ]);
        } else {
            Session::put([
                'foto' => 'usuario-inicial.jpg',
            ]);
        }
        if (count($roles) == 1) {
            Session::put([
                'rol_id' => $roles[0]['id'],
                'rol_nombre' => $roles[0]['nombre'],
            ]);
            if ($roles[0]['id'] > 2) {
                if ($roles[0]['id'] == 3) {
                    Session::put([
                        'area' => $this->persona->cargo->area->area,
                        'cargo' => $this->persona->cargo->cargo
                    ]);
                } else {
                    Session::put([
                        'area' => $this->persona->carrera->facultad->facultad,
                        'cargo' => $this->persona->carrera->carrera
                    ]);
                }
            }
        } else {
            Session::put('roles', $roles);
        }
    }
    //==========================================================================================
}
