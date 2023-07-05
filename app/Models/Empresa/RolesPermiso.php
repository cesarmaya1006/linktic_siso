<?php

namespace App\Models\Empresa;

use App\Models\Admin\Menu;
use App\Models\Admin\Rol;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RolesPermiso extends Model
{
    use HasFactory,Notifiable;
    protected $table = "roles_permisos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
