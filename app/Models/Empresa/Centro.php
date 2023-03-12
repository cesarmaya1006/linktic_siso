<?php

namespace App\Models\Empresa;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Centro extends Model
{
    use HasFactory,Notifiable;
    protected $table = "centros";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function personas()
    {
        return $this->hasMany(Persona::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function dominios()
    {
        return $this->hasMany(Dominio::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function correos_corporativos()
    {
        return $this->hasMany(CorreoCorporativo::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function centro_porcentajes()
    {
        return $this->hasMany(CentroPorcentaje::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function centro_personas()
    {
        return $this->belongsToMany(Persona::class, 'centro_porcentajes');
    }
}
