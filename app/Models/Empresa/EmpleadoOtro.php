<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmpleadoOtro extends Model
{
    use HasFactory,Notifiable;
    protected $table = "empleado_otros";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estado_siso()
    {
        return $this->belongsTo(RentadoEstado::class, 'otro_estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
