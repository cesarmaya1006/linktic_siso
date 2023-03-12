<?php

namespace App\Models\Personas;

use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\Empresa\Cargo;
use App\Models\Empresa\Centro;
use App\Models\Empresa\CentroPorcentaje;
use App\Models\Empresa\Contrato;
use App\Models\Empresa\CorreoCorporativo;
use App\Models\Empresa\Dominio;
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
    //----------------------------------------------------------------------------------
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function centro()
    {
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function centro_porcentajes()
    {
        return $this->hasMany(CentroPorcentaje::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function personas_centros()
    {
        return $this->belongsToMany(Centro::class, 'centro_porcentajes');
    }
    //----------------------------------------------------------------------------------
    public function correos_corporativos()
    {
        return $this->hasMany(CorreoCorporativo::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function dominios()
    {
        return $this->hasMany(Dominio::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
