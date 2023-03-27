<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GlpiPrinterModel extends Model
{
    use HasFactory,Notifiable;
    protected $table = "glpi_printermodels";
    protected $guarded = ['id'];
    protected $connection = 'mysql_connect_2';
    //----------------------------------------------------------------------------------
    public function impresoras()
    {
        return $this->hasMany(GlpiPrinter::class, 'printermodels_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
