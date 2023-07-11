<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DominioCorreoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dominios = [
            '3tcapital.co',
            'andresforero.co',
            'bankco.co',
            'convocatoriaturismo.co',
            'dantepet.co',
            'eduklab.co',
            'eduklab2022.com',
            'expone.co',
            'fincarsas.com',
            'hicome.co',
            'hidestiny.co',
            'joseluiscorrea.co',
            'keepsalud.co',
            'linktic.co',
            'linktic.com',
            'mafecarrascal.com',
            'mas57.co',
            'miguelgutierrez.com.co',
            'nataliabedoya.com.co',
            'negos.co',
            'quierovenderenlinea.co',
            'semdo.co',
            'tictur.org',
            'tuvitrina.co',
            'vendeenlinea.com.co',
            'vendeporinternet.co',
            'wimbu.co',
            'yaktil.com',
            'N/A',
            'prevaleceseguros.com',
            'givingsas.com',



];

foreach ($dominios as $key => $value) {
    DB::table('dominio_correos')->insert([
        'dominio' => $value,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
}
    }
}
