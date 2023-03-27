<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipo2 extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_computers";
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
    public function fabricante()
    {
        return $this->belongsTo(GlpiManufacturer::class, 'manufacturers_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipoComputador()
    {
        return $this->belongsTo(GlpiComputertype::class, 'computertypes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function modeloComputador()
    {
        return $this->belongsTo(GlpiComputermodel::class, 'computermodels_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function sistemaOp()
    {
        return $this->belongsTo(GlpiSistemasOp::class, 'autoupdatesystems_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function locacion()
    {
        return $this->belongsTo(GlpiLocation::class, 'locations_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function procesadores()
    {
        return $this->belongsToMany(GlpiDeviceprocessor::class, 'glpi_items_deviceprocessors', 'items_id', 'deviceprocessors_id');
    }
    //----------------------------------------------------------------------------------
    public function itemsdeviceprocessor()
    {
        return $this->hasMany(GlpiCompDeviceprocessor::class, 'items_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function itemsdevicedrives()
    {
        return $this->hasMany(GlpiItemsDeviceharddrives::class, 'items_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function memorias()
    {
        return $this->belongsToMany(GlpiDevicememories::class, 'glpi_items_devicememories', 'items_id', 'devicememories_id');
    }
    //----------------------------------------------------------------------------------
    public function itemsdevicememories()
    {
        return $this->hasMany(GlpiItemsDevicememories::class, 'items_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function grupo()
    {
        return $this->belongsTo(GlpiGroups::class, 'groups_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //==================================================================================
    public function infocomp()
    {
        return $this->hasMany (GlpiInfocom::class, 'items_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
