<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiNotepads extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_notepads";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
}
