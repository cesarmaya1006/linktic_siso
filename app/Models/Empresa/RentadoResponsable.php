<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RentadoResponsable extends Model
{
    use HasFactory,Notifiable;
    protected $table = "rentado_responsables";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(EquipoRentado::class, 'rentado_responsable_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
