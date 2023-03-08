<?php

namespace App\Models\Personas;

use App\Models\Admin\Cargo;
use App\Models\Admin\Carrera;
use App\Models\Admin\Prestamo;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Persona extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'personas';
    protected $guarded = [];

    public function tipos_docu()
    {
        return $this->belongsTo(Tipo_Docu::class, 'docutipos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id');
    }
    //----------------------------------------------------------------------------------


}
