<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DominioEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dominios = [
            'linktic.co',
            'vendeporinternet.co',
            'hicome.co',
            '3tcapital.co',
            'quierovenderenlinea.co',
            'mas57.co',
            'fincarsas.com',
            'andresforero.co',
            'joseluiscorrea.co',
            'miguelgutierrez.com.co',
            'nataliabedoya.com.co',
            'tictur.org',
            'yaktil.com',
            'convocatoriaturismo.co',
            'eduklab.co',
            'tuvitrina.co',
            'expone.co',
            'wimbu.co ',
            'hidestiny.co',
            'keepsalud.co',
            'linktic.com',
            'bankco.co',
            'negos.co',
            'eduklab2022.com',
            'vendeenlinea.com.co',
            'dantepet.co'
        ];

        foreach ($dominios as $key => $value) {
            DB::table('dominio_empresas')->insert([
                'dominio' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
