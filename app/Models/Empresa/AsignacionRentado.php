<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AsignacionRentado extends Model
{
    use HasFactory,Notifiable;
    protected $table = "asignacion_rentados";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function equipo()
    {
        return $this->belongsTo(EquipoRentado::class, 'equipo_rentado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asignado()
    {
        return $this->belongsTo(RentadoAsignado::class, 'rentado_asignado_id', 'id');
    }
    //----------------------------------------------------------------------------------
            
}
