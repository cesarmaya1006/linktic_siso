<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RentadoTipo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "rentado_tipos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(EquipoRentado::class, 'rentado_tipo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
