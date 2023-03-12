<?php

namespace App\Models\Empresa;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CorreoCorporativo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "correo_corporativos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function area()
    {
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
