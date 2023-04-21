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
'Aprendiz Sena',
'Aprendizaje',
'Indefinido',
'Miguel gomez',
'N/A',
'Obra Labor',
'Obra labor ',
'OPS',
'OPS por horas',
'Orden de servicios',
'Pendiente respuesta marcela',
'Preguntar a Oscar ',
'Prestación de Servicios',
'Prestacion de servicios por entregables',
'Prestación de Servicios por Horas',
'Termino Fijo',

        ];

        foreach ($contratos as $key => $value) {
            DB::table('contratos')->insert([
                'tipo' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
