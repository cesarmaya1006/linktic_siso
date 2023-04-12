<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubCentroCosto extends Model
{
    use HasFactory,Notifiable;
    protected $table = "sub_centro_costos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function centro_costo()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(EquipoRentado::class, 'sub_centro_costo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
