<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AsignacionEquipo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "asignacion_equipos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function cenco()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
