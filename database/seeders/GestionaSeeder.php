<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GestionaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gestiones = [
            'PENDIENTE',
            'Dirección de Operaciones',
            'Gerencia de Contratacion Publica',
            'Gestión Administrativa y Contable',
            'Gestión Comercial',
            'Gestión de auditoria y control interno',
            'Gestión de Comunicaciones',
            'Gestión de Contratación Pública',
            'Gestión de Fábrica de Software',
            'Gestión de Gerencia',
            'Gestión de Marketing',
            'Gestión de Mejoramiento Continuo (Calidad)',
            'Gestión de Proyectos',
            'Gestión de Soporte TI',
            'Gestión de Talento Humano',
            'Gestion Financiera',
            'N/A',
        ];

        foreach ($gestiones as $key => $value) {
            DB::table('gestionas')->insert([
                'gestion' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
