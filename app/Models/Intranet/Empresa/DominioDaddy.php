<?php

namespace App\Models\Intranet\Empresa;

use App\Models\Empresa\Empleado;
use App\Models\Empresa\CentroCosto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class dominioDaddy extends Model
{
    use HasFactory,Notifiable;
    protected $table = "dominio_daddies";
    protected $guarded = ['id'];

    public function centro()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costos_id', 'id');
    }
    
    public function usuario()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
