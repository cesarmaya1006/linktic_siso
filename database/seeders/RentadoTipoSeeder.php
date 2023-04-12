<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentadoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['tipo' => 'Laptop'],
            ['tipo' => 'Desktop'],
            ['tipo' => 'Notebook'],
            ['tipo' => 'All in One'],
            ['tipo' => 'Servidor'],
        ];
        foreach ($estados as $item) {
            DB::table('rentado_tipos')->insert([
                'tipo' => $item['tipo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
