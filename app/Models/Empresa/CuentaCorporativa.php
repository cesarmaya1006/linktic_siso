<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CuentaCorporativa extends Model
{
    use HasFactory,Notifiable;
    protected $table = "cuenta_corporativas";
    protected $guarded = ['id'];
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_cuentas');
    }
    //----------------------------------------------------------------------------------
    public function empleados_cuentas()
    {
        return $this->hasMany(EmpleadoCuentas::class, 'cuenta_corporativa_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //==================================================================================
    public function cargos()
    {
        return $this->belongsToMany(MatrizCargo::class,'matriz_cuentas_corporativas');
    }
    //==================================================================================
}
