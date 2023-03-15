<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Centros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centros = [
            '2',
            '3',
            '5',
            '7',
            '8',
            '200',
            '201',
            '202',
            '203',
            '204',
            '205',
            '206',
            '209',
            '210',
            '211',
            '242',
            '286',
            '291',
            '295',
            '297',
            '299',
            '302',
            '303',
            '307',
            '315',
            '318',
            '319',
            '321',
            '324',
            '326',
            '329',
            '332',
            '335',
            '336',
            '339',
            '342',
            '343',
            '344',
            '345',
            '346',
            '348',
            '349',
            '354',
            '399'
        ];

        foreach ($centros as $key => $value) {
            DB::table('centros')->insert([
                'centro_costo' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
