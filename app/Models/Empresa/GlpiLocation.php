<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiLocation extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_locations";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(Equipo2::class, 'locations_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
