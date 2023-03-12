<?php

namespace App\Models\Empresa;

use App\Models\Admin\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PermisoCargo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "permiso_cargos";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
