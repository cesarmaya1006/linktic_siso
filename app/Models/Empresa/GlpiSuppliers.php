<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiSuppliers extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_suppliers";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
}