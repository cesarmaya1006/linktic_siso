<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Empleado extends Model
{
    use HasFactory,Notifiable;
    protected $table = "empleados";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function gestion()
    {
        return $this->belongsTo(Gestiona::class, 'gestionas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contratos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function centro()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function equipospropios()
    {
        return $this->hasMany(EmpleadoEquipoRentado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function impresoras()
    {
        return $this->hasMany(EmpleadoImpresora::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function monitores()
    {
        return $this->hasMany(EmpleadoMonitores::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function equiposrentados()
    {
        return $this->belongsToMany(EquipoRentado::class, 'empleado_equipo_rentados');
    }
    //----------------------------------------------------------------------------------
    public function cuentas_corporativas()
    {
        return $this->belongsToMany(CuentaCorporativa::class, 'empleado_cuentas');
    }
    //----------------------------------------------------------------------------------
    public function cuentas_empleados()
    {
        return $this->hasMany(EmpleadoCuentas::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function licencias_empleado()
    {
        return $this->hasMany(EmpleadoLicencia::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function licencias_corporativas()
    {
        return $this->belongsToMany(Licencia::class, 'empleado_licencias');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function otros()
    {
        return $this->hasMany(EmpleadoOtro::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
