<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RentadoAsignado extends Model
{
    use HasFactory,Notifiable;
    protected $table = "rentado_asignados";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function asignaciones()
    {
        return $this->hasMany(AsignacionRentado::class, 'rentado_asignado_id', 'id');
    }
    //----------------------------------------------------------------------------------    
}
