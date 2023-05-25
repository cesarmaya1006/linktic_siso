<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Licencia extends Model
{
    use HasFactory,Notifiable;
    protected $table = "licencias";
    protected $guarded = ['id'];
}