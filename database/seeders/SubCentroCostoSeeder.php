<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCentroCostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centros = [
            ['centro_costo_id' => 21,'consecutivo' => 1],
            ['centro_costo_id' => 21,'consecutivo' => 2],
        ];
        foreach ($centros as $item) {
            DB::table('sub_centro_costos')->insert([
                'centro_costo_id' => $item['centro_costo_id'],
                'consecutivo' => $item['consecutivo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
