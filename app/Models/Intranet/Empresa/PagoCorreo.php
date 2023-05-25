<?php

namespace App\Models\Intranet\Empresa;

use App\Models\Empresa\CentroCosto;
use App\Models\Intranet\Empresa\DominioCorreo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PagoCorreo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "pago_correo_corporativo";
    protected $guarded = ['id'];


     //----------------------------------------------------------------------------------
     public function centro()
     {
         return $this->belongsTo(CentroCosto::class, 'centro_costos_id', 'id');
     }
     public function dominio()
     {
         return $this->belongsTo(DominioCorreo::class, 'dominio_id', 'id');
     }
     //----------------------------------------------------------------------------------


    }