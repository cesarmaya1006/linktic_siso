<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiMonitorType extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_monitortypes";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function monitores()
    {
        return $this->hasMany(GlpiMonitor::class, 'monitortypes_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
