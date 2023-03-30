<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatrizCaracteristicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caracteristicas = [
            ['area' => 'ADMINISTRATIVAS','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I3 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'FINANCIERA','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I3 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'LICITACIONES','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I3 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'TALENTO HUMANO','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I3 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'COMERCIAL','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I3 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'GERENTES DE PROYECTOS','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'CALIDAD','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'INGENIEROS DE REQUERIMIENTOS','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'PMO','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'ANALISTA DE REQUERIMIENTOS','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '256 GB SSD','ram' => '8 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 5','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'MARKETING','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '512 GB SSD','ram' => '12 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 7','tarj_video' => '2GB INTEGRADA','puertos' => 'USB - HDMI'],
            ['area' => 'DISEÑADORES','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '512 GB SSD','ram' => '12 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 7','tarj_video' => '2GB INTEGRADA','puertos' => 'USB - HDMI'],
            ['area' => 'COMUNITY MANAGER','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '512 GB SSD','ram' => '12 GB DDR4','procesador' => 'INTEL CORE I5 DE 11VA O 10MA GENERACION RYZEN 7','tarj_video' => '2GB INTEGRADA','puertos' => 'USB - HDMI'],
            ['area' => 'SOPORTE','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '512 GB ','ram' => '16 GB DDR4','procesador' => 'INTEL CORE I7 DE 11VA O 10MA GENERECION RYZEN 7','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'INFRAESCTUCTURA','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '512 GB ','ram' => '16 GB DDR4','procesador' => 'INTEL CORE I7 DE 11VA O 10MA GENERECION RYZEN 7','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'DESARROLLO','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '512 GB ','ram' => '16 GB DDR4','procesador' => 'INTEL CORE I7 DE 11VA O 10MA GENERECION RYZEN 7','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'FABRICA DE SOFTWARE','sis_operativo' => 'WINDOWS 10 PRO','disco_duro' => '512 GB ','ram' => '16 GB DDR4','procesador' => 'INTEL CORE I7 DE 11VA O 10MA GENERECION RYZEN 7','tarj_video' => 'N/A','puertos' => 'USB - HDMI'],
            ['area' => 'EQUIPOS MAC','sis_operativo' => 'MacOS Big Sur','disco_duro' => '245.12 Gb SSD','ram' => '8GB DDR4','procesador' => 'CHIP APPLE M1','tarj_video' => '7C GPU','puertos' => 'ADAPTADOR HUB TIPO C']

        ];
        foreach ($caracteristicas as $item) {
            DB::table('matriz_caracteristicas')->insert([
                'area' => $item['area'],
                'sis_operativo' => $item['sis_operativo'],
                'disco_duro' => $item['disco_duro'],
                'ram' => $item['ram'],
                'procesador' => $item['procesador'],
                'tarj_video' => $item['tarj_video'],
                'puertos' => $item['puertos'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
