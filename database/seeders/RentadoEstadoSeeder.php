<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentadoEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['estado' => 'Bodega'],
            ['estado' => 'Devuelto'],
            ['estado' => 'En Uso'],
            ['estado' => 'Subsanado'],
        ];
        foreach ($estados as $item) {
            DB::table('rentado_estados')->insert([
                'estado' => $item['estado'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
