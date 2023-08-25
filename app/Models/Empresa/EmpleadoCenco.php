<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmpleadoCenco extends Model
{
    use HasFactory,Notifiable;
    protected $table = "empleados_cencos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleados_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function cenco()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
