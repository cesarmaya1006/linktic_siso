<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Area extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['area' => 'Consejo Superior Universitario'],
            ['area' => 'Rectoría'],
            ['area' => 'Secretaría General'],
            ['area' => 'Oficina de Control Interno'],
            ['area' => 'Oficina de Planeación y Desarrollo Institucional'],
            ['area' => 'Oficina Jurídica'],
            ['area' => 'Oficina de Aseguramiento de la Calidad'],
            ['area' => 'Oficina de Relaciones Interinstitucionales'],
            ['area' => 'Oficina de Tecnologías de la Información y las Comunicaciones'],
            ['area' => 'Consejo Académico'],
            ['area' => 'Vicerrectoría Académica'],
            ['area' => 'Consejo de Facultad'],
            ['area' => 'Subdirección de Educación Virtual'],
            ['area' => 'Área de Admisiones'],
            ['area' => 'Área de Biblioteca'],
            ['area' => 'Área de Recursos Educativos'],
            ['area' => 'Área de Centro de Idiomas'],
            ['area' => 'Vicerrectoría de Investigación, Innovación y Extensión'],
            ['area' => 'Subdirección de Investigación, Innovación y Desarrollo'],
            ['area' => 'Área de Sello Editorial'],
            ['area' => 'Área de Transferencia y Resultado de Investigaciones'],
            ['area' => 'Subdirección de Proyección Social y Extensión'],
            ['area' => 'Área de Egresados'],
            ['area' => 'Vicerrectoría Administrativa y Financiera'],
            ['area' => 'Subdirección de Talento Humano'],
            ['area' => 'Subdirección Financiera'],
            ['area' => 'Área de Presupuesto'],
            ['area' => 'Área de Tesorería'],
            ['area' => 'Área de Contabilidad'],
            ['area' => 'Subdirección de Servicios Administrativos y Contratación'],
            ['area' => 'Área de Recursos Físicos'],
            ['area' => 'Subdirección de Bienestar Universitario'],
            ['area' => 'Subdirección de Promoción y Comunicaciones'],
        ];
        foreach ($tipos as $item) {
            DB::table('areas')->insert([
                'area' => $item['area'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
