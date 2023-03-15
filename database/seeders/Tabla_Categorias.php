<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'Tipo',
            'Notebook',
            'Escritorio',
            'Convertible',
            'Laptop',
            'Desktop',
            'Portatil',
            'Servidor',
            'All in One',
            'Monitor',
            'Perifericos'

        ];
        foreach ($categorias as $key => $value) {
            DB::table('categorias')->insert([
                'categoria' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
