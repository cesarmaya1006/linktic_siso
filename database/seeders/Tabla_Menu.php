<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tabla_Menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            // Menus padre
            //1
            ['nombre' =>  'Inicio', 'menu_id' => '0', 'url' =>  'admin/index', 'orden' => '1', 'icono' =>  'fas fa-home'],
            //------------------------------------------------------------------------------------------------------------
            //2
            ['nombre' =>  'Sistema', 'menu_id' => '0', 'url' =>  '#', 'orden' => '2', 'icono' =>  'fas fa-tools'],
            ['nombre' =>  'Menús', 'menu_id' => '2', 'url' =>  'admin/menu-index', 'orden' => '1', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Roles Usuarios', 'menu_id' => '2', 'url' =>  'admin/rol-index', 'orden' => '2', 'icono' =>  'fas fa-user-tag'],
            ['nombre' =>  'Menú - Roles', 'menu_id' => '2', 'url' =>  'admin/_menus_rol', 'orden' => '3', 'icono' =>  'fas fa-chalkboard-teacher'],
            ['nombre' =>  'Permisos', 'menu_id' => '2', 'url' =>  'admin/permiso-index', 'orden' => '4', 'icono' =>  'fas fa-lock'],
            ['nombre' =>  'Permisos -Rol', 'menu_id' => '2', 'url' =>  'admin/_permiso-rol', 'orden' => '5', 'icono' =>  'fas fa-user-lock'],
            ['nombre' =>  'Usuarios', 'menu_id' => '2', 'url' =>  'admin/usuarios', 'orden' => '6', 'icono' =>  'fas fa-user-friends'],
            ['nombre' =>  'Areas', 'menu_id' => '2', 'url' =>  'admin/areas', 'orden' => '7', 'icono' =>  'fas fa-user-friends'],
            ['nombre' =>  'Cargos', 'menu_id' => '2', 'url' =>  'admin/cargos', 'orden' => '8', 'icono' =>  'fas fa-user-friends'],
            ['nombre' =>  'Facultades', 'menu_id' => '2', 'url' =>  'admin/facultades', 'orden' => '9', 'icono' =>  'fas fa-user-friends'],
            ['nombre' =>  'Carreras', 'menu_id' => '2', 'url' =>  'admin/carreras', 'orden' => '10', 'icono' =>  'fas fa-user-friends'],
            ['nombre' =>  'Inventarios', 'menu_id' => '2', 'url' =>  'admin/inventarios', 'orden' => '11', 'icono' =>  'fas fa-clipboard-list'],
            //------------------------------------------------------------------------------------------------------------
            //14
            ['nombre' =>  'Otras opciones', 'menu_id' => '0', 'url' =>  '#', 'orden' => '3', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Consulte nuestas políticas de datos', 'menu_id' => '14', 'url' =>  'usuario/consulta-politicas', 'orden' => '1', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Ayuda', 'menu_id' => '14', 'url' =>  'usuario/ayuda', 'orden' => '2', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Actualizar datos', 'menu_id' => '14', 'url' =>  'usuario/actualizar-datos', 'orden' => '3', 'icono' =>  'fas fa-edit'],
            ['nombre' =>  'Cambiar contraseña', 'menu_id' => '14', 'url' =>  'usuario/cambiar-password', 'orden' => '4', 'icono' =>  'fas fa-key'],
            //------------------------------------------------------------------------------------------------------------
            //19
            ['nombre' =>  'Parametros', 'menu_id' => '0', 'url' =>  '#', 'orden' => '4', 'icono' =>  'fas fa-cogs'],
            ['nombre' =>  'Carnets', 'menu_id' => '19', 'url' =>  'admin/parametros/carnets-index', 'orden' => '1', 'icono' =>  'fas fa-id-card'],

            //----------------------------------------------------------------------------------------------------------------------

        ];

        foreach ($menus as $menu) {
            DB::table('menu')->insert([
                'nombre' => utf8_encode(utf8_decode($menu['nombre'])),
                'menu_id' => $menu['menu_id'],
                'url' => $menu['url'],
                'orden' => $menu['orden'],
                'icono' => $menu['icono'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
