<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Facultad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['facultad' => 'Facultad de Administración y Economía'],
            ['facultad' => 'Facultad de Ciencias de la Salud'],
            ['facultad' => 'Facultad de Ciencias Sociales'],
            ['facultad' => 'Facultad de Derecho'],
            ['facultad' => 'Facultad de Ingeniería y Arquitectura'],
            ['facultad' => 'Programa de Ciencias Básicas'],
        ];
        foreach ($tipos as $item) {
            DB::table('facultads')->insert([
                'facultad' => $item['facultad'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
