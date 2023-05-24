<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MatrizCuentasCorporativa extends Model
{
    use HasFactory,Notifiable;
    protected $table = "matriz_cuentas_corporativas";
    protected $guarded = ['id'];
    
}
