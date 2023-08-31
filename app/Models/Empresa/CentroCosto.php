<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CentroCosto extends Model
{
    use HasFactory,Notifiable;
    protected $table = "centro_costos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function sub_centros()
    {
        return $this->hasMany(SubCentroCosto::class, 'centro_costo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(EquipoRentado::class, 'centro_costo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'centro_costos_id', 'id');
    }
    //----------------------------------------------------------------------------------
     //----------------------------------------------------------------------------------
     public function correos()
     {
         return $this->hasMany(Correo::class, 'centro_costos_id', 'id');
     }
     //----------------------------------------------------------------------------------
     //----------------------------------------------------------------------------------
    public function cencoempleado()
    {
        return $this->hasMany(EmpleadoCenco::class, 'centro_costos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleadoss()
    {
        return $this->belongsToMany(Empleado::class, 'empleados_cencos');
    }
    //----------------------------------------------------------------------------------
    public function asignaciones()
    {
        return $this->hasMany(AsignacionEquipo::class, 'centro_costos_id', 'id');
    }
    //----------------------------------------------------------------------------------

}

