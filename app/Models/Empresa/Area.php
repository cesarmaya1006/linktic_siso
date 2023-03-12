<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Area extends Model
{
    use HasFactory,Notifiable;
    protected $table = "areas";
    protected $guarded = ['id'];
    //----------------------------------------------------------------------------------
    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
