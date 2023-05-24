<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmpleadoImpresora extends Model
{
    use HasFactory,Notifiable;
    protected $table = "empleado_impresoras";
    protected $guarded = ['id'];
}
