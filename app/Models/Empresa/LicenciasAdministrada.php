<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LicenciasAdministrada extends Model
{
    use HasFactory,Notifiable;
    protected $table = "licencias_administradas";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleados_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
