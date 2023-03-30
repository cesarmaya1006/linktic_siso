<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorRentadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
                'PC-COM',
                'RENTACOMPUTO',
                'TECNOREDES Y SERVICIOS SAS',
                'AYS COMPUTADORES',
                'COMPURENT',
                'MICROHOME'

        ];

        foreach ($array as $key => $value) {
            DB::table('proveedor_rentados')->insert([
                'proveedor' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
