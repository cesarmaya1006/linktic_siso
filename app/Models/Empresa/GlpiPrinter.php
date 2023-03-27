<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiPrinter extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_printers";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->belongsTo(GlpiUsuarios::class, 'users_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function grupo()
    {
        return $this->belongsTo(GlpiGroups::class, 'groups_id', 'id');
    }
    //----------------------------------------------------------------------------------
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
    public function tipoImpresora()
    {
        return $this->belongsTo(GlpiPrinterType::class, 'printertypes_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function modeloImpresora()
    {
        return $this->belongsTo(GlpiPrinterModel::class, 'printermodels_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
