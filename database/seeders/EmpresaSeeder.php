<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = [
            'Linktic',
            'Consorcio',
            'Wimbu',
            '3tCapital',
            'Hicome',
            'Cymetria',

        ];

        foreach ($empresas as $key => $value) {
            DB::table('empresas')->insert([
                'empresa' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
