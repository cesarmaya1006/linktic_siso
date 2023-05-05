<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EquipoRentado extends Model
{
    use HasFactory,Notifiable;
    protected $table = "equipo_rentados";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function proveedor()
    {
        return $this->belongsTo(ProveedorRentado::class, 'proveedor_rentado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function centro_costo()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sub_centro_costo()
    {
        return $this->belongsTo(SubCentroCosto::class, 'sub_centro_costo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function responsable()
    {
        return $this->belongsTo(RentadoResponsable::class, 'rentado_responsable_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipo()
    {
        return $this->belongsTo(RentadoTipo::class, 'rentado_tipo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(RentadoEstado::class, 'rentado_estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function asignaciones()
    {
        return $this->hasMany(AsignacionRentado::class, 'equipo_rentado_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function usuariosrentados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_equipo_rentados');
    }
    //----------------------------------------------------------------------------------
}
