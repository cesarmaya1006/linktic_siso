<?php

namespace Database\Seeders;

use App\Models\Admin\Menu;
use App\Models\Empresa\Cargo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_PermisoCargoMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = Cargo::get();
        $menus = Menu::where('menu_id','>',2)->get();
        foreach ($cargos as $cargo) {
            foreach ($menus as $menu) {
                DB::table('permiso_cargos')->insert([
                    'cargo_id' => $cargo->id,
                    'menu_id' => $menu->id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
