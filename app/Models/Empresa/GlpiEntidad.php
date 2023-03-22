<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiEntidad extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_entities";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(Equipo2::class, 'entities_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function grupos()
    {
        return $this->hasMany(GlpiGroups::class, 'entities_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
