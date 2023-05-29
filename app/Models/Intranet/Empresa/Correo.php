<?php

namespace App\Models\Intranet\Empresa;

use App\Models\Empresa\CentroCosto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Correo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "correos";
    protected $guarded = ['id'];

    //----------------------------------------------------------------------------------
    public function centro()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function dominio()
    {
        return $this->belongsTo(Dominio::class, 'dominio_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
