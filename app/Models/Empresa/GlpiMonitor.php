<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiMonitor extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_monitors";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function entidad()
    {
        return $this->belongsTo(GlpiEntidad::class, 'entities_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->belongsTo(GlpiUsuarios::class, 'users_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(GlpiState::class, 'states_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function fabricante()
    {
        return $this->belongsTo(GlpiManufacturer::class, 'manufacturers_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function locacion()
    {
        return $this->belongsTo(GlpiLocation::class, 'locations_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function tipoMonitor()
    {
        return $this->belongsTo(GlpiMonitorType::class, 'monitortypes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function modeloMonitor()
    {
        return $this->belongsTo(GlpiMonitorModel::class, 'monitormodels_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
