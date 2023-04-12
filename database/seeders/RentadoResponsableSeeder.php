<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentadoResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responsables = [
            ['responsable' => 'Andres Amaya'],
            ['responsable' => 'Camila Niño'],
            ['responsable' => 'Claudia Aldana'],
            ['responsable' => 'Deizith Diaz'],
            ['responsable' => 'Diana Bermudez'],
            ['responsable' => 'Diana Cardozo'],
            ['responsable' => 'Diego Urbano'],
            ['responsable' => 'Fabian Echeverria'],
            ['responsable' => 'Fernan Ocampo'],
            ['responsable' => 'Henry Chica'],
            ['responsable' => 'Herney Ortega'],
            ['responsable' => 'Jhon Calderon'],
            ['responsable' => 'Khaterine Daza'],
            ['responsable' => 'Laura Moreno'],
            ['responsable' => 'Marcela Beltran'],
            ['responsable' => 'Marcela Ramirez'],
            ['responsable' => 'Miguel Gomez'],
            ['responsable' => 'Monica Lorena Mendez'],
            ['responsable' => 'Monica Rey'],
            ['responsable' => 'Natalia Fajardo'],
            ['responsable' => 'Nicolas Arias'],
            ['responsable' => 'Nicolas Ceron'],
            ['responsable' => 'Norma Perez'],
            ['responsable' => 'Oscar Salazar'],
            ['responsable' => 'Sandra Muñoz'],
            ['responsable' => 'Sandra Paez'],
            ['responsable' => 'Santiago suarez'],
            ['responsable' => 'Vende en linea'],
            ['responsable' => 'Victor Quintero'],

        ];
        foreach ($responsables as $item) {
            DB::table('rentado_responsables')->insert([
                'responsable' => $item['responsable'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
