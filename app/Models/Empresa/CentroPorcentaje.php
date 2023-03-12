<?php

namespace App\Models\Empresa;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CentroPorcentaje extends Model
{
    use HasFactory,Notifiable;
    protected $table = "centro_porcentajes";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function personas()
    {
        return $this->hasMany(Persona::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function centros()
    {
        return $this->hasMany(Centro::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
