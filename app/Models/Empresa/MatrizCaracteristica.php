<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MatrizCaracteristica extends Model
{
    use HasFactory,Notifiable;
    protected $table = "matriz_caracteristicas";
    protected $guarded = ['id'];
}
