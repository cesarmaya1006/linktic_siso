<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Empresa extends Model
{
    use HasFactory,Notifiable;
    protected $table = "empresas";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'empresas_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
