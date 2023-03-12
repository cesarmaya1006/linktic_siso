<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categoria extends Model
{
    use HasFactory,Notifiable;
    protected $table = "categorias";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function licencias()
    {
        return $this->hasMany(Licencia::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function dominios()
    {
        return $this->hasMany(Dominio::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
