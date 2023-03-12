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
            'Gestión de Proyectos',
            'Gestión de Marketing',
            'Gestión Administrativa y Contable',
            'Gestión de Mejoramiento Continuo (Calidad)',
            'Gestion Financiera',
            'Gestión de Soporte TI',
            'PENDIENTE',
            'Gestión de Comunicaciones',
            'Gestión de auditoria y control interno',
            'Gestion de soporte TI',
            'Gestión de Fábrica de Software',
            'Gestión de Contratación Pública',
            'Gestion de Comercial',
        ];

        foreach ($areas as $key => $value) {
            DB::table('areas')->insert([
                'area' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
