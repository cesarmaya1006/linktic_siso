<?php

namespace App\Models\Empresa;

use App\Models\Admin\Menu;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cargo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "cargos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function personas()
    {
        return $this->hasMany(Persona::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'permiso_cargos');
    }
    //----------------------------------------------------------------------------------
    public function permisos_cargo()
    {
        return $this->hasMany(PermisoCargo::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
