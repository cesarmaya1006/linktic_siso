<?php

namespace App\Models\Empresa;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dominio extends Model
{
    use HasFactory,Notifiable;
    protected $table = "dominios";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function centro()
    {
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
