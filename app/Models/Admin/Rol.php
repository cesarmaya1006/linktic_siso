<?php

namespace App\Models\Admin;

use App\Models\Carnets\Carnet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rol extends Model
{
    use HasFactory, Notifiable;
    protected $table = "roles";
    protected $guarded = ['id'];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_rol');
    }
    //----------------------------------------------------------------------------------
    public function carnets()
    {
        return $this->hasMany(Carnet::class, 'rol_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
