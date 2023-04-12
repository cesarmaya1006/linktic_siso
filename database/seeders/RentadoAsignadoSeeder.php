<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentadoAsignadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignados = [
            ['asignado' => 'Adel Mahomud'],
            ['asignado' => 'Alejandra Bances '],
            ['asignado' => 'Alejandra Carranza'],
            ['asignado' => 'Alejandra Guzman '],
            ['asignado' => 'Alejandra Jimenez '],
            ['asignado' => 'Alejandra Saenz'],
            ['asignado' => 'Alejandra Trujillo'],
            ['asignado' => 'Ana Guerra'],
            ['asignado' => 'Andrea Bejarano'],
            ['asignado' => 'Andres Buitrago'],
            ['asignado' => 'Andres Melo'],
            ['asignado' => 'Andres Rubiano'],
            ['asignado' => 'Andres Zarote'],
            ['asignado' => 'Angel Medina'],
            ['asignado' => 'Angela Hernandez'],
            ['asignado' => 'Angelica Herran'],
            ['asignado' => 'Angelica Tello'],
            ['asignado' => 'Angie Cruz '],
            ['asignado' => 'Astrid Rodriguez'],
            ['asignado' => 'Brandon Lara'],
            ['asignado' => 'Brayan Salazar'],
            ['asignado' => 'Camilo Berdugo'],
            ['asignado' => 'Camilo Bornachera'],
            ['asignado' => 'Camilo Ramirez'],
            ['asignado' => 'Carlos Barrero'],
            ['asignado' => 'Carlos Rojas'],
            ['asignado' => 'Carlos Serna'],
            ['asignado' => 'Carlos Turriago'],
            ['asignado' => 'Caterin Velasquez'],
            ['asignado' => 'Cristian Martinez '],
            ['asignado' => 'Cristina Martinez'],
            ['asignado' => 'Dahize Almanza'],
            ['asignado' => 'Daniel Alexis Fernández Becerra'],
            ['asignado' => 'Daniela Jimenez'],
            ['asignado' => 'Daniela Mejia'],
            ['asignado' => 'Dasuly Giraldo'],
            ['asignado' => 'Diana Cardozo'],
            ['asignado' => 'Didier Castillo'],
            ['asignado' => 'Diego Caro'],
            ['asignado' => 'Dixon Anato'],
            ['asignado' => 'Edna Alarcon'],
            ['asignado' => 'Eliana Robayo'],
            ['asignado' => 'Erick Vacca'],
            ['asignado' => 'Estefani Canelones'],
            ['asignado' => 'Fernanda Martinez'],
            ['asignado' => 'Fernando Trujillo'],
            ['asignado' => 'FONPAZ'],
            ['asignado' => 'Gabriel Romero'],
            ['asignado' => 'Geraldine Martinez'],
            ['asignado' => 'Gina Pedraza'],
            ['asignado' => 'Hailyn Rodriguez '],
            ['asignado' => 'Harold Yepes'],
            ['asignado' => 'Hernando Rios'],
            ['asignado' => 'Indira Sauliz'],
            ['asignado' => 'Ivan Jerez'],
            ['asignado' => 'Ivan Murcia'],
            ['asignado' => 'Jaime Guevara'],
            ['asignado' => 'Jairo Rodriguez'],
            ['asignado' => 'Jairo Vanegas'],
            ['asignado' => 'jefferson jimenez'],
            ['asignado' => 'Jeison Ariza '],
            ['asignado' => 'Jenny Niño'],
            ['asignado' => 'Jessica Basallo'],
            ['asignado' => 'Jessica Gaitan '],
            ['asignado' => 'Jhoan Montealegre'],
            ['asignado' => 'Jhonatan Martinez'],
            ['asignado' => 'Johanna Moreno'],
            ['asignado' => 'Johanna Russi'],
            ['asignado' => 'John Calderon'],
            ['asignado' => 'John Rueda'],
            ['asignado' => 'Jorge Mogollon'],
            ['asignado' => 'Jose Alexander Vargas'],
            ['asignado' => 'Jose Garcia'],
            ['asignado' => 'Jose Lopez'],
            ['asignado' => 'Jose Mario Mier Rivera'],
            ['asignado' => 'Juan Carlos Alvarez                                             '],
            ['asignado' => 'Juan Jose Sotelo'],
            ['asignado' => 'Julieth Valencia'],
            ['asignado' => 'July Gordillo'],
            ['asignado' => 'Justin Diaz'],
            ['asignado' => 'Justine Pulido'],
            ['asignado' => 'Karen Ardila'],
            ['asignado' => 'Karin Fuenmayor'],
            ['asignado' => 'Katherine Amanda Medina Araujo'],
            ['asignado' => 'Katherine Medina'],
            ['asignado' => 'Kevin Guerrero'],
            ['asignado' => 'Kevin Marquez'],
            ['asignado' => 'Kimberly Zambrano '],
            ['asignado' => 'Laura Izquierdo'],
            ['asignado' => 'Laura Moreno '],
            ['asignado' => 'Leidy Bolivar'],
            ['asignado' => 'Leidy Leon '],
            ['asignado' => 'Leonardo Chaves'],
            ['asignado' => 'Claudia Aldana'],
            ['asignado' => 'Luis Bejarano'],
            ['asignado' => 'Luis Hernandez'],
            ['asignado' => 'Luis Pacheco'],
            ['asignado' => 'Luis Samaca'],
            ['asignado' => 'Luis Venegas'],
            ['asignado' => 'Luz Hernandez'],
            ['asignado' => 'Marcela Beltran'],
            ['asignado' => 'Maria Bargallo'],
            ['asignado' => 'Maria Velez'],
            ['asignado' => 'Michael Santa'],
            ['asignado' => 'Monica Parra'],
            ['asignado' => 'Nanlel Gonzalez'],
            ['asignado' => 'Nathalia Montenegro'],
            ['asignado' => 'Nelson Barrera'],
            ['asignado' => 'Nestor Cambindo'],
            ['asignado' => 'Nicol Franco'],
            ['asignado' => 'Oscar Infante'],
            ['asignado' => 'Oscar Sosa'],
            ['asignado' => 'Oscar Velazquez'],
            ['asignado' => 'Oswaldo Paez'],
            ['asignado' => 'Paola Barbosa'],
            ['asignado' => 'Paula Garzon '],
            ['asignado' => 'Paula Rendon'],
            ['asignado' => 'Rama Judicial '],
            ['asignado' => 'Richard Valderrama'],
            ['asignado' => 'Sandra Molano'],
            ['asignado' => 'Sandra Quiñonez'],
            ['asignado' => 'Sneider Cortes '],
            ['asignado' => 'Stefania Piedrahita'],
            ['asignado' => 'Steven Robledo'],
            ['asignado' => 'Tatiana Oyola'],
            ['asignado' => 'Tatiana Rodriguez'],
            ['asignado' => 'Valeria Garcia '],
            ['asignado' => 'Valeria Gnecco '],
            ['asignado' => 'Vilmary Lopez'],
            ['asignado' => 'Viviana Vanegas'],
            ['asignado' => 'Wilfer Beltran '],
            ['asignado' => 'Yina Ruiz'],
            ['asignado' => 'Yulieth Parra'],


        ];
        foreach ($asignados as $item) {
            DB::table('rentado_asignados')->insert([
                'asignado' => $item['asignado'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
