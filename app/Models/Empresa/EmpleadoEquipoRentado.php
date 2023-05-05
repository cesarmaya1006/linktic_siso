<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmpleadoEquipoRentado extends Model
{
    use HasFactory,Notifiable;
    protected $table = "empleado_equipo_rentados";
    protected $guarded = ['id'];

}
