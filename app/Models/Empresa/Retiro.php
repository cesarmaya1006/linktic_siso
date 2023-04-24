<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Retiro extends Model
{
    use HasFactory,Notifiable;
    protected $table = "retiros";
    protected $guarded = ['id'];

}
