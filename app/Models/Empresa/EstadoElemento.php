<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EstadoElemento extends Model
{
    use HasFactory,Notifiable;
    protected $table = "estado_elementos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'estado_equipo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
