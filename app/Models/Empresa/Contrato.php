<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contrato extends Model
{
    use HasFactory,Notifiable;
    protected $table = "contratos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'contratos_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
