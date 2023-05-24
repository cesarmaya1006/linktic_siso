<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmpleadoMonitores extends Model
{
    use HasFactory,Notifiable;
    protected $table = "empleado_monitores";
    protected $guarded = ['id'];
}
