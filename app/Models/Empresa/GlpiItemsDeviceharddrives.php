<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiItemsDeviceharddrives extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_items_deviceharddrives";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipo()
    {
        return $this->belongsTo(Equipo2::class, 'items_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
