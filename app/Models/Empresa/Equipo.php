<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "equipos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function estado()
    {
        return $this->belongsTo(EstadoElemento::class, 'estado_elemento_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
