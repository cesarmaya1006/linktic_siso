<?php

namespace App\Models\Empresa;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contrato extends Model
{
    use HasFactory,Notifiable;
    protected $table = "contratos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function cargos()
    {
        return $this->hasMany(Persona::class, 'contrato_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
