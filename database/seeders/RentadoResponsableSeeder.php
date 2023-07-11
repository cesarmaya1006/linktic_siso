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
            ['responsable' => 'Andres Felipe Rincon Valencia'],
            ['responsable' => 'Camila Niño'],
            ['responsable' => 'Claudia Aldana'],
            ['responsable' => 'Deizith Diaz'],
            ['responsable' => 'Diana Bermudez'],
            ['responsable' => 'Diana Cardozo - Diana Bermudez'],
            ['responsable' => 'Diego Fernando Urbano Chaves'],
            ['responsable' => 'Diego Urbano / Mauricio Salazar'],
            ['responsable' => 'Fabian Echeverria'],
            ['responsable' => 'Fernan Ocampo'],
            ['responsable' => 'Henry Chica'],
            ['responsable' => 'Herney Ortega'],
            ['responsable' => 'John Calderon'],
            ['responsable' => 'Khaterine Daza'],
            ['responsable' => 'Laura Moreno'],
            ['responsable' => 'Marcela Beltran'],
            ['responsable' => 'Miguel Gomez'],
            ['responsable' => 'Monica Lorena Mendez'],
            ['responsable' => 'Monica Rey'],
            ['responsable' => 'Natalia Fajardo'],
            ['responsable' => 'Nicolas Arias'],
            ['responsable' => 'Nicolas Arias - Diana Bermudez'],
            ['responsable' => 'Nicolas Ceron'],
            ['responsable' => 'Norma Perez'],
            ['responsable' => 'Oscar Infante'],
            ['responsable' => 'Oscar Mauricio Salazar Pulido'],
            ['responsable' => 'Oscar Salazar - Diana Cardozo'],
            ['responsable' => 'Oscar Salazar - Diana Cardozo - Diana Bermudez'],
            ['responsable' => 'Sandra Muñoz'],
            ['responsable' => 'Sandra Paez'],
            ['responsable' => 'Santiago Suarez'],
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
