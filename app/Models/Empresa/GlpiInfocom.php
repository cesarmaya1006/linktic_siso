<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiInfocom extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_infocoms";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function equipo()
    {
        return $this->belongsTo(Equipo2::class, 'items_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function proveedor()
    {
        return $this->belongsTo(GlpiSuppliers::class, 'suppliers_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
