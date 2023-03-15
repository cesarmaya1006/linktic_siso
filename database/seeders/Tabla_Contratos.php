<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Contratos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contratos = [
            'Indefinido',
            'Prestacion de servicios',
            'Obra Labor',
            'Preguntar a Oscar ',
            'Prestacion de servicios por entregables',
            'Pendiente respuesta marcela',
            'Miguel gomez',
            'Aprendizaje'
        ];

        foreach ($contratos as $key => $value) {
            DB::table('contratos')->insert([
                'tipo' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
