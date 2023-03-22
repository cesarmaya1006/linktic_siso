<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiDeviceprocessor extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_deviceprocessors";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->belongsToMany(Equipo2::class, 'glpi_items_deviceprocessors', 'deviceprocessors_id', 'items_id');
    }
    //----------------------------------------------------------------------------------
    public function itemsdeviceprocessor()
    {
        return $this->belongsTo(GlpiCompDeviceprocessor::class, 'deviceprocessors_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
