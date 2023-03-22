<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiDevicememories extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_devicememories";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->belongsToMany(Equipo2::class, 'glpi_items_devicememories', 'devicememories_id', 'items_id');
    }
    //----------------------------------------------------------------------------------
    public function itemsdevicememories()
    {
        return $this->belongsTo(GlpiItemsDevicememories::class, 'devicememories_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
