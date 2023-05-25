<?php

namespace App\Models\Intranet\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DominioCorreo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "dominio_correos";
    protected $guarded = ['id'];
}
