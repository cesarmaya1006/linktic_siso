<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MatrizCargo extends Model
{
    use HasFactory,Notifiable;
    protected $table = "matriz_cargos";
    protected $guarded = ['id'];
    //--------------------------------------------------------------------
    public function cuentas_corporativas()
    {
        return $this->belongsToMany(CuentaCorporativa::class, 'matriz_cuentas_corporativas');
    }
    //--------------------------------------------------------------------
    public function matriz_perfiles()
    {
        return $this->belongsToMany(MatrizCargo::class, 'matriz_perfil_cargos');
    }
    //--------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function matriz_cuentas_corporativas()
    {
        return $this->hasMany(MatrizCuentasCorporativa::class, 'matriz_cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function matriz_perfil()
    {
        return $this->hasMany(MatrizPerfilCargo::class, 'matriz_cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
