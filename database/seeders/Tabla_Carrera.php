<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Carrera extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['facultad_id' => '1', 'carrera' => 'Administración de Empresas Comerciales','abreb' => 'Admin. de Empresas'],
            ['facultad_id' => '1', 'carrera' => 'Economía','abreb' => 'Economía'],
            ['facultad_id' => '1', 'carrera' => 'Tecnología en Asistencia Gerencial Presencial Bogotá','abreb' => 'Tec. Asistencia Gerencial'],
            ['facultad_id' => '1', 'carrera' => 'Tecnología en Asistencia Gerencial Presencial - Funza','abreb' => 'Tec. Asistencia Gerencial'],
            ['facultad_id' => '2', 'carrera' => 'Bacteriología y Laboratorio Clínico','abreb' => 'Bacteriología y Laboratorio Clínico'],
            ['facultad_id' => '2', 'carrera' => 'Maestría en Microbiología','abreb' => 'M. en Microbiología'],
            ['facultad_id' => '3', 'carrera' => 'Trabajo Social','abreb' => 'Trabajo Social'],
            ['facultad_id' => '3', 'carrera' => 'Turismo','abreb' => 'Turismo'],
            ['facultad_id' => '3', 'carrera' => 'Especialización en Gerencia en Seguridad y Salud en el Trabajo','abreb' => 'G. en Seg. y Salud en el Trab.'],
            ['facultad_id' => '3', 'carrera' => 'Maestría en Desarrollo Humano','abreb' => 'M. en Desarrollo Humano'],
            ['facultad_id' => '4', 'carrera' => 'Derecho','abreb' => 'Derecho'],
            ['facultad_id' => '4', 'carrera' => 'Especialización en Derecho Internacional Público','abreb' => 'Esp. en Derecho Int. Púb.'],
            ['facultad_id' => '4', 'carrera' => 'Maestría en Derecho Penal','abreb' => 'M. en Derecho Penal'],
            ['facultad_id' => '5', 'carrera' => 'Tecnología en Delineantes de Arquitectura e Ingeniería','abreb' => 'Tecg. Delineantes Arq. e Ing.'],
            ['facultad_id' => '5', 'carrera' => 'Tecnología en Administración y Ejecución de Construcciones','abreb' => 'Tecg. Admin. Ejec. Const.'],
            ['facultad_id' => '5', 'carrera' => 'Construcción y Gestión en Arquitectura Ciclo Profesional','abreb' => 'Const. .Gest. en Arq.'],
            ['facultad_id' => '5', 'carrera' => 'Diseño Digital y Multimedia','abreb' => 'Diseño Digital y Multimedia'],
            ['facultad_id' => '5', 'carrera' => 'Especialización en Edificación Sostenible','abreb' => 'Esp. Edif. Sost'],
            ['facultad_id' => '5', 'carrera' => 'Especialización Tecnológica en Metodología BIM para el Desarrollo de Proyectos de la Edificación','abreb' => 'Esp. Des. Proy. Edif.'],
            ['facultad_id' => '5', 'carrera' => 'Maestría en Construcción Sostenible','abreb' => 'M. en Constr. Sostenible'],
        ];
        foreach ($tipos as $item) {
            DB::table('carreras')->insert([
                'facultad_id' => $item['facultad_id'],
                'carrera' => $item['carrera'],
                'abreb' => $item['abreb'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
