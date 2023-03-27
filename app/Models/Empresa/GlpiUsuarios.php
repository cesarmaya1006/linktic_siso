<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiUsuarios extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_users";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(Equipo2::class, 'users_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function monitores()
    {
        return $this->hasMany(GlpiMonitor::class, 'users_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function impresoras()
    {
        return $this->hasMany(GlpiPrinter::class, 'users_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
