<?php

namespace App\Models\Admin;

use App\Models\PQR\tipoPQR;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuNorma extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikunormas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function documento()
    {
        return $this->belongsTo(WikuDocument::class, 'fuente_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function temaEspecifico()
    {
        return $this->belongsTo(WikuTemaEspecifico::class, 'wikutemaespecifico_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function criterios()
    {
        return $this->hasMany(WikuCriterio::class, 'norma_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function palabras()
    {
        return $this->belongsToMany(WikuPalabras::class, 'wikupalabrasnormas');
    }
    //----------------------------------------------------------------------------------
    public function asociaciones()
    {
        return $this->hasMany(WikuAsociacion::class, 'wiku_norma_id', 'id');
    }

    //----------------------------------------------------------------------------------
    public function asociaciontipopqr()
    {
        return $this->belongsToMany(tipoPQR::class, 'wikuasociaciones');
    }
}
