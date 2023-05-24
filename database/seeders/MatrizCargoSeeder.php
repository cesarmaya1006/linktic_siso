<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatrizCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            ['cargo' => 'Asistentes gerentes de procesos'],
            ['cargo' => 'Gerente Fabrica de software'],
            ['cargo' => 'Gerente Marketing'],
            ['cargo' => 'Gerente PMO'],
            ['cargo' => 'Gerentes de procesos'],
            ['cargo' => 'Gerentes de proyecto'],
            ['cargo' => 'Lider de infraestructura'],
            ['cargo' => 'Lider de seguridad'],
            ['cargo' => 'Lider de soporte'],
            ['cargo' => 'Lider Noc/Soc'],
            ['cargo' => 'Lideres Fabrica de software'],
            ['cargo' => 'Otros cargos'],

        ];
        foreach ($cargos as $key => $value) {
            DB::table('matriz_cargos')->insert([
                'cargo' => $value['cargo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
