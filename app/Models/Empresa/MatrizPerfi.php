<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MatrizPerfi extends Model
{
    use HasFactory,Notifiable;
    protected $table = "matriz_perfis";
    protected $guarded = ['id'];
}
