<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Licencias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $licencias = [
            'OFFICE 365',	'PROJECT',	'CREATIVE CLOUD',	'ADOBE ACROBAT READER PRO',	'Articulate',	'Platzi',	'Asana',	'Flutter',

        ];

foreach ($licencias as $key => $value) {
    DB::table('licencias')->insert([
        'licencia' => $value,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
}
    }
}
