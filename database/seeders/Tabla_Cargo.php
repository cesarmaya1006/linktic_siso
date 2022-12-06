<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Cargo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['area_id' => '2', 'cargo' => 'Rector de Universidad'],
            ['area_id' => '2', 'cargo' => 'Asesor'],
            ['area_id' => '2', 'cargo' => 'Profesional Especializado'],
            ['area_id' => '2', 'cargo' => 'Profesional Universitario'],
            ['area_id' => '2', 'cargo' => 'Conductor mecánico'],
            ['area_id' => '11', 'cargo' => 'Vicerrector de Universidad'],
        ];
        foreach ($tipos as $item) {
            DB::table('cargos')->insert([
                'area_id' => $item['area_id'],
                'cargo' => $item['cargo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
