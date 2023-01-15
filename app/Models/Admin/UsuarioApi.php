<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UsuarioApi extends Model
{
    use HasFactory,Notifiable;
    protected $table = "users";
    protected $guarded = ['id'];
}
