<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiGroups extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_groups";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(Equipo2::class, 'groups_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function entidad()
    {
        return $this->belongsTo(GlpiEntidad::class, 'entities_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
