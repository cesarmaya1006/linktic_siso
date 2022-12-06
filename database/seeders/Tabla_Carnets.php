<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Carnets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['rol_id' => '3', 'marco1' => 'rgb(2,0,36)', 'marco2' => 'rgb(13,11,136)', 'marco3' => 'rgb(153,210,230)', 'marco4' => 'rgb(11,127,175)', 'marco5' => 'rgb(255,255,255)', 'label1' => 'rgb(68, 113, 235)'],
            ['rol_id' => '4', 'marco1' => 'rgb(2,0,36)', 'marco2' => 'rgb(13,11,136)', 'marco3' => 'rgb(153,210,230)', 'marco4' => 'rgb(11,127,175)', 'marco5' => 'rgb(255,255,255)', 'label1' => 'rgb(68, 113, 235)'],
            ['rol_id' => '5', 'marco1' => 'rgb(2,0,36)', 'marco2' => 'rgb(13,11,136)', 'marco3' => 'rgb(153,210,230)', 'marco4' => 'rgb(11,127,175)', 'marco5' => 'rgb(255,255,255)', 'label1' => 'rgb(68, 113, 235)'],
            ['rol_id' => '6', 'marco1' => 'rgb(2,0,36)', 'marco2' => 'rgb(13,11,136)', 'marco3' => 'rgb(153,210,230)', 'marco4' => 'rgb(11,127,175)', 'marco5' => 'rgb(255,255,255)', 'label1' => 'rgb(68, 113, 235)'],

        ];
        foreach ($tipos as $item) {
            DB::table('carnets')->insert([
                'rol_id' => $item['rol_id'],
                'marco1' => $item['marco1'],
                'marco2' => $item['marco2'],
                'marco3' => $item['marco3'],
                'marco4' => $item['marco4'],
                'marco5' => $item['marco5'],
                'label1' => $item['label1'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
