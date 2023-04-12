<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProveedorRentado extends Model
{
    use HasFactory,Notifiable;
    protected $table = "proveedor_rentados";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(EquipoRentado::class, 'proveedor_rentado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
