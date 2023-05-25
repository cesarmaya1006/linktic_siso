<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoCuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados_cuentas = [
            ['empleado_id' => '5', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '5', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '5', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '5', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '5', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '6', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '6', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '7', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '7', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '7', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '8', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '8', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '8', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '8', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '8', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '8', 'cuenta_corporativa_id' => '6'],
            ['empleado_id' => '9', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '9', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '9', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '10', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '10', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '10', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '10', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '11', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '11', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '12', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '12', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '12', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '13', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '13', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '14', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '14', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '14', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '15', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '15', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '15', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '15', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '15', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '15', 'cuenta_corporativa_id' => '6'],
            ['empleado_id' => '16', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '16', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '16', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '16', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '16', 'cuenta_corporativa_id' => '7'],
            ['empleado_id' => '17', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '17', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '17', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '17', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '17', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '17', 'cuenta_corporativa_id' => '6'],
            ['empleado_id' => '18', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '18', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '18', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '18', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '18', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '18', 'cuenta_corporativa_id' => '6'],
            ['empleado_id' => '19', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '20', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '20', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '20', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '21', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '21', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '22', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '22', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '22', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '22', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '22', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '23', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '23', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '23', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '23', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '23', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '24', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '24', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '24', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '24', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '24', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '25', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '25', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '25', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '25', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '25', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '26', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '26', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '26', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '26', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '26', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '27', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '27', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '27', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '27', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '27', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '28', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '28', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '29', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '29', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '29', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '29', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '29', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '30', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '30', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '30', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '30', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '30', 'cuenta_corporativa_id' => '6'],
            ['empleado_id' => '30', 'cuenta_corporativa_id' => '7'],
            ['empleado_id' => '31', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '31', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '31', 'cuenta_corporativa_id' => '6'],
            ['empleado_id' => '32', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '32', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '33', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '34', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '34', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '34', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '34', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '34', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '35', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '35', 'cuenta_corporativa_id' => '6'],
            ['empleado_id' => '36', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '36', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '36', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '36', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '36', 'cuenta_corporativa_id' => '5'],
            ['empleado_id' => '37', 'cuenta_corporativa_id' => '1'],
            ['empleado_id' => '37', 'cuenta_corporativa_id' => '2'],
            ['empleado_id' => '37', 'cuenta_corporativa_id' => '3'],
            ['empleado_id' => '37', 'cuenta_corporativa_id' => '4'],
            ['empleado_id' => '37', 'cuenta_corporativa_id' => '5'],
        ];
        foreach ($empleados_cuentas as $empleados_cuenta) {
            DB::table('empleado_cuentas')->insert([
                'empleado_id' => $empleados_cuenta['empleado_id'],
                'cuenta_corporativa_id' => $empleados_cuenta['cuenta_corporativa_id'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}