<?php

namespace Database\Seeders;

use App\Models\Admin\Menu;
use App\Models\Admin\Rol;
use App\Models\Empresa\RolesPermiso;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DominioDaddySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagosCorreo = [

            ['cuenta' => 'danielgarcia99.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-01-12', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => NULL, 'valor' => 0, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'juancapacho.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-01-12', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => NULL, 'valor' => 0, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'mariosolano.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-01-12', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => NULL, 'valor' => 0, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'saraybechara.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-01-17', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => NULL, 'valor' => 0, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'ricardoferrocd22.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-01-19', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => NULL, 'valor' => 0, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'miseventos.co', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-01-27', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => NULL, 'valor' => 0, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'aidvenezuela.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-02-14', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => '6326', 'fecha_de_compra' => '2022-02-10'],
            ['cuenta' => 'ayudaylibertad.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-02-14', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 64999, 'tarjeta' => '6326', 'fecha_de_compra' => '2022-02-10'],
            ['cuenta' => 'venezuelaaidlive.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-02-14', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 84999, 'tarjeta' => '5603', 'fecha_de_compra' => '2023-02-15'],
            ['cuenta' => 'hechos.com.co', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-02-18', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 69399, 'tarjeta' => '6326', 'fecha_de_compra' => '2022-02-10'],
            ['cuenta' => 'aidlive.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-02-26', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 159999, 'tarjeta' => '5603', 'fecha_de_compra' => '2023-02-15'],
            ['cuenta' => 'amarbelleza.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-04', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 41990, 'tarjeta' => '7035', 'fecha_de_compra' => '2022-03-04'],
            ['cuenta' => 'rositaboutique.com.co', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-04', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 39990, 'tarjeta' => '7035', 'fecha_de_compra' => '2022-03-04'],
            ['cuenta' => 'tinva.co', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-04', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 39339, 'tarjeta' => '7035', 'fecha_de_compra' => '2022-03-04'],
            ['cuenta' => 'eduklab21.co', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-08', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 39339, 'tarjeta' => '7035', 'fecha_de_compra' => '2022-03-08'],
            ['cuenta' => 'lin4.co', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-15', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 39339, 'tarjeta' => '7035', 'fecha_de_compra' => '2022-03-15'],
            ['cuenta' => 'comercian.co', 'estado' => 'Activo', 'ticket_renovacion' => 11632, 'fecha_de_vencimiento' => '2024-03-17', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 159999, 'tarjeta' => '7635', 'fecha_de_compra' => '2022-03-23'],
            ['cuenta' => 'diplomadoedumaker.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-23', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 41990, 'tarjeta' => '2966', 'fecha_de_compra' => '2022-03-23'],
            ['cuenta' => 'eduklab2022.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-23', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 41990, 'tarjeta' => '2966', 'fecha_de_compra' => '2022-03-23'],
            ['cuenta' => 'edumaker2022.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-23', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 41990, 'tarjeta' => '2966', 'fecha_de_compra' => '2022-03-23'],
            ['cuenta' => 'conrazon.co', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-03-28', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 45390, 'tarjeta' => '3038', 'fecha_de_compra' => '2022-03-28'],
            ['cuenta' => 'wimbu.net', 'estado' => 'Activo', 'ticket_renovacion' => 11692, 'fecha_de_vencimiento' => '2023-03-29', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 72999, 'tarjeta' => '7035', 'fecha_de_compra' => '2023-04-03'],
            ['cuenta' => 'siugj.com', 'estado' => 'Activo', 'ticket_renovacion' => 11781, 'fecha_de_vencimiento' => '2024-04-18', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 128827, 'tarjeta' => '7635', 'fecha_de_compra' => '2022-04-17'],
            ['cuenta' => 'balnearioelcedromacho.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-04-19', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => '4464', 'fecha_de_compra' => '2022-04-27'],
            ['cuenta' => 'hotellabocana.com', 'estado' => 'Inactivo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-04-19', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => '4464', 'fecha_de_compra' => '2022-04-27'],
            ['cuenta' => 'yaktil.com', 'estado' => 'Activo', 'ticket_renovacion' => 11780, 'fecha_de_vencimiento' => '2024-04-20', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 85828, 'tarjeta' => '7635', 'fecha_de_compra' => '2022-04-17'],
            ['cuenta' => 'wimbu.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-04', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 122999, 'tarjeta' => '3820', 'fecha_de_compra' => '2022-04-13'],
            ['cuenta' => 'urban960.com.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-05', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 67969, 'tarjeta' => '2992', 'fecha_de_compra' => '2022-05-05'],
            ['cuenta' => 'mas57.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-09', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 122999, 'tarjeta' => '2992', 'fecha_de_compra' => '2022-05-05'],
            ['cuenta' => 'miguelgutierrez.com.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-12', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 76499, 'tarjeta' => '2992', 'fecha_de_compra' => '2022-05-05'],
            ['cuenta' => 'nataliabedoya.com.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-12', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 76499, 'tarjeta' => '2992', 'fecha_de_compra' => '2022-05-05'],
            ['cuenta' => 'juventud.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-15', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 122999, 'tarjeta' => '2992', 'fecha_de_compra' => '2022-05-05'],
            ['cuenta' => 'expone.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-18', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 122999, 'tarjeta' => '2992', 'fecha_de_compra' => '2022-05-05'],
            ['cuenta' => 'simongaviria.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-05-23', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 122999, 'tarjeta' => '2992', 'fecha_de_compra' => '2022-05-05'],
            ['cuenta' => 'miexpone.co', 'estado' => 'Activo', 'ticket_renovacion' => 12104, 'fecha_de_vencimiento' => '2024-06-08', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 169999, 'tarjeta' => '4464', 'fecha_de_compra' => '2023-06-08'],
            ['cuenta' => 'mitutor.com.co', 'estado' => 'Activo', 'ticket_renovacion' => 12104, 'fecha_de_vencimiento' => '2024-06-08', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 76499, 'tarjeta' => '4464', 'fecha_de_compra' => '2023-06-08'],
            ['cuenta' => 'joseluiscorrea.co', 'estado' => 'Activo', 'ticket_renovacion' => 12104, 'fecha_de_vencimiento' => '2023-06-08', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 169999, 'tarjeta' => '3555', 'fecha_de_compra' => '2023-06-08'],
            ['cuenta' => 'marscol.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-07-13', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-07-29'],
            ['cuenta' => 'vendeenlinea.com.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-07-13', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 39990, 'tarjeta' => '1277', 'fecha_de_compra' => '2022-07-13'],
            ['cuenta' => 'semdoesp.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-07-19', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-07-29'],
            ['cuenta' => 'keepsalud.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-07-21', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 139999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-07-29'],
            ['cuenta' => '3tcapital.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-07-25', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 139999, 'tarjeta' => '1277', 'fecha_de_compra' => '2022-07-26'],
            ['cuenta' => 'registraduria.org', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-07-25', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 74999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-07-29'],
            ['cuenta' => 'alfredoramos.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-08-01', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 139999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-07-29'],
            ['cuenta' => 'OCAMPO.ME', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-08-04', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 203907, 'tarjeta' => NULL, 'fecha_de_compra' => '2020-08-06'],
            ['cuenta' => 'wilsonrojas.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-08-10', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 139999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-07-29'],
            ['cuenta' => 'negos.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-08-19', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 46479, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'villanazareth.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-08-23', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 46479, 'tarjeta' => '2498', 'fecha_de_compra' => '2022-08-23'],
            ['cuenta' => 'papoamin.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-09-03', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 79999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-09-08'],
            ['cuenta' => 'eduklab.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-09-08', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 139999, 'tarjeta' => NULL, 'fecha_de_compra' => '2022-08-08'],
            ['cuenta' => 'cjuvinao.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-09-09', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 49999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-09-09'],
            ['cuenta' => 'tictur.org', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-09-10', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 84999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-09-08'],
            ['cuenta' => 'yakdecarga.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-09-21', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => NULL, 'fecha_de_compra' => '2022-08-08'],
            ['cuenta' => 'sumafrut.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-09-25', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => NULL, 'fecha_de_compra' => '2022-08-08'],
            ['cuenta' => 'hicome.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-10-02', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 159999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-09-08'],
            ['cuenta' => 'bankco.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-10-10', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 49999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-10-10'],
            ['cuenta' => 'bankco.com.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-10-12', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 92191, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-10-12'],
            ['cuenta' => 'hidestiny.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-10-14', 'renovacion' => 'No', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 117189, 'tarjeta' => '6326', 'fecha_de_compra' => '2021-10-14'],
            ['cuenta' => 'zonarosa.org', 'estado' => 'Activo', 'ticket_renovacion' => 10941, 'fecha_de_vencimiento' => '2023-11-19', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 84999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-11-17'],
            ['cuenta' => 'zonarosabogota.co', 'estado' => 'Activo', 'ticket_renovacion' => 10941, 'fecha_de_vencimiento' => '2023-11-19', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 159999, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-11-17'],
            ['cuenta' => 'zonarosabogota.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-11-19', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => NULL, 'fecha_de_compra' => '2022-08-08'],
            ['cuenta' => 'zonarosabogota.com.co', 'estado' => 'Activo', 'ticket_renovacion' => 10941, 'fecha_de_vencimiento' => '2023-11-19', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 76499, 'tarjeta' => '3555', 'fecha_de_compra' => '2022-11-17'],
            ['cuenta' => 'yaktransporte.com', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2023-11-20', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 71499, 'tarjeta' => NULL, 'fecha_de_compra' => '2022-08-08'],
            ['cuenta' => 'tuvitrina.co', 'estado' => 'Activo', 'ticket_renovacion' => 11125, 'fecha_de_vencimiento' => '2023-12-23', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 159999, 'tarjeta' => '7635', 'fecha_de_compra' => '2022-12-20'],
            ['cuenta' => 'bajoelcielo.com', 'estado' => 'Activo', 'ticket_renovacion' => 11125, 'fecha_de_vencimiento' => '2023-12-26', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 79999, 'tarjeta' => '7635', 'fecha_de_compra' => '2022-12-20'],
            ['cuenta' => 'vendeporinternet.co', 'estado' => 'Activo', 'ticket_renovacion' => 11125, 'fecha_de_vencimiento' => '2023-12-28', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 159999, 'tarjeta' => '7635', 'fecha_de_compra' => '2022-12-20'],
            ['cuenta' => 'paragrafo.co', 'estado' => 'Activo', 'ticket_renovacion' => 11210, 'fecha_de_vencimiento' => '2024-01-07', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 0, 'tarjeta' => '7635', 'fecha_de_compra' => '2023-01-13'],
            ['cuenta' => 'semdo.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2024-01-12', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 0, 'tarjeta' => 'PayPal Agreement ###505', 'fecha_de_compra' => '2023-01-12'],
            ['cuenta' => 'LINKTIC.CO (3 años)', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2025-01-02', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 410023, 'tarjeta' => '6326', 'fecha_de_compra' => '2021-12-09'],
            ['cuenta' => 'LINKTIC.COM.CO(3 años)', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2025-01-02', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 234248, 'tarjeta' => '6326', 'fecha_de_compra' => '2021-12-09'],
            ['cuenta' => 'vendenlinea.xyz(3 años)', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2025-05-17', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 125935, 'tarjeta' => '4464', 'fecha_de_compra' => '2022-05-17'],
            ['cuenta' => 'mariafernandavalencia.com(4 años)', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2025-10-26', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 259996, 'tarjeta' => '6329', 'fecha_de_compra' => '2021-11-24'],
            ['cuenta' => 'FERNANOCAMPO.COM(5 años)', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2026-10-10', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 324995, 'tarjeta' => '6326', 'fecha_de_compra' => '2021-10-06'],
            ['cuenta' => 'FERNANOCAMPOGONZALEZ.COM(5 años)', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2026-10-10', 'renovacion' => 'Si', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 324995, 'tarjeta' => '6326', 'fecha_de_compra' => '2021-10-06'],
            ['cuenta' => 'LINKTIC.COM (5 años)', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2027-01-03', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 370884, 'tarjeta' => '6326', 'fecha_de_compra' => '2021-12-09'],
            ['cuenta' => 'dantepet.co', 'estado' => 'Activo', 'ticket_renovacion' => NULL, 'fecha_de_vencimiento' => '2024-01-23', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 54999, 'tarjeta' => '7635', 'fecha_de_compra' => '2024-01-23'],
            ['cuenta' => 'carolinacarvajal.com', 'estado' => 'Activo', 'ticket_renovacion' => 11315, 'fecha_de_vencimiento' => '2024-02-06', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 45828, 'tarjeta' => '5603', 'fecha_de_compra' => '2023-02-06'],
            ['cuenta' => 'givingsas.com', 'estado' => 'Activo', 'ticket_renovacion' => 11561, 'fecha_de_vencimiento' => '2024-03-07', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 45828, 'tarjeta' => '7635', 'fecha_de_compra' => '2023-03-07'],
            ['cuenta' => 'nicolasgomez.co', 'estado' => 'Activo', 'ticket_renovacion' => 11663, 'fecha_de_vencimiento' => '2024-04-04', 'renovacion' => '', 'centro_costos_id' => 97, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 44999, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],
            ['cuenta' => 'prevaleceseguros.com', 'estado' => 'Activo', 'ticket_renovacion' => 11753, 'fecha_de_vencimiento' => '2024-04-13', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 44999, 'tarjeta' => '7635', 'fecha_de_compra' => '2023-04-13'],
            ['cuenta' => 'hemero.com.co', 'estado' => 'Activo', 'ticket_renovacion' => 11839, 'fecha_de_vencimiento' => '2024-04-27', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 49709, 'tarjeta' => '3021', 'fecha_de_compra' => '2023-04-27'],
            ['cuenta' => 'agustinocampo.co', 'estado' => 'Activo', 'ticket_renovacion' => 11896, 'fecha_de_vencimiento' => '2024-05-08', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 54020,94, 'tarjeta' => '7635', 'fecha_de_compra' => '2023-05-08'],
            ['cuenta' => 'lin5.co', 'estado' => 'Activo', 'ticket_renovacion' => 11984, 'fecha_de_vencimiento' => '2024-05-17', 'renovacion' => '', 'centro_costos_id' => 95, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 49999, 'tarjeta' => '4094', 'fecha_de_compra' => '2023-05-17'],
            ['cuenta' => 'lacarpa.co', 'estado' => 'Activo', 'ticket_renovacion' => 12100, 'fecha_de_vencimiento' => '2024-06-13', 'renovacion' => '', 'centro_costos_id' => 107, 'empleado_id' => 16, 'factura' => 'H2', 'valor' => 79998, 'tarjeta' => NULL, 'fecha_de_compra' => NULL],


        ];

        foreach ($pagosCorreo as $item) {

            DB::table('dominio_daddies')->insert([
                'cuenta' => $item['cuenta'],
                'estado' => $item['estado'],
                'ticket_renovacion' => $item['ticket_renovacion'],
                'fecha_de_vencimiento' => $item['fecha_de_vencimiento'],
                'renovacion' => $item['renovacion'],
                'centro_costos_id' => $item['centro_costos_id'],
                'empleado_id' => $item['empleado_id'],
                'factura' => $item['factura'],
                'tarjeta' => $item['tarjeta'],
                'valor' => $item['valor'],
                'fecha_de_compra' => $item['fecha_de_compra'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }
        $menus = Menu::where('url','<>','#')->get();
        $roles = Rol::where('id','>',1)->get();
        foreach ($roles as $rol) {
            foreach ($menus as $menu) {
               $rolMenusPermisos = RolesPermiso::where('rol_id',$rol->id)->where('menu_id',$menu->id)->get();
               if ($rolMenusPermisos->count()==0) {
                $nuevoPermiso['rol_id'] = $rol->id;
                $nuevoPermiso['menu_id'] = $menu->id;
                RolesPermiso::create($nuevoPermiso);
               }
            }
        }
    }
}
