<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
                    'Dirección De Operaciones',
                    'Gestión Administrativa Y Contable',
                    'Gestión Comercial',
                    'Gestión De Auditoria Y Control Interno',
                    'Gestion De Comercial',
                    'Gestión De Comunicaciones',
                    'Gestión De Contratación Pública',
                    'Gestión De Fábrica De Software',
                    'Gestión De Gerencia',
                    'Gestión De Marketing',
                    'Gestión De Mejoramiento Continuo (Calidad)',
                    'Gestión De Proyectos',
                    'Gestión De Soporte Ti',
                    'Gestión De Talento Humano',
                    'Gestión Financiera'


        ];

        foreach ($areas as $key => $value) {
            DB::table('areas')->insert([
                'area' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
