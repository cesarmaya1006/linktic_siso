<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuentaCorporativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuentas = [
            'SIG',
            'Tickets cliente',
            'Tickets Agente',
            'GLPI',
            'OTBAN',
            'JIRA',
            'GODADDY',
        ];

        foreach ($cuentas as $key => $value) {
            DB::table('cuenta_corporativas')->insert([
                'cuenta' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
