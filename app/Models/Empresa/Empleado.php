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
}
