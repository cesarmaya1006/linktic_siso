<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatrizPerfiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            ['perfil' => 'Super-Admin'],
            ['perfil' => 'Admin'],
            ['perfil' => 'Tecnico'],
            ['perfil' => 'Supervisor'],
            ['perfil' => 'Self-Service'],

        ];
        foreach ($cargos as $key => $value) {
            DB::table('matriz_perfis')->insert([
                'perfil' => $value['perfil'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
