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
        $menu_id =0;
        $menu_linea_1 =1;
        $menu_linea_2 =2;
        $menu_linea_3 =8;
        $menu_linea_4 =16;
        $menu_linea_5 =20;
        $menus = [
            // Menus padre
            //1
            ['nombre' =>  'Inicio', 'menu_id' => $menu_id, 'url' =>  'admin/index', 'orden' => '1', 'icono' =>  'fas fa-home'],
            //------------------------------------------------------------------------------------------------------------
            //2
            ['nombre' =>  'Sistema', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '2', 'icono' =>  'fas fa-tools'],
            ['nombre' =>  'Menús', 'menu_id' => $menu_linea_2, 'url' =>  'admin/menu-index', 'orden' => '1', 'icono' =>  'fas fa-list-ul'],
            ['nombre' =>  'Roles Usuarios', 'menu_id' => $menu_linea_2, 'url' =>  'admin/rol-index', 'orden' => '2', 'icono' =>  'fas fa-user-tag'],
            ['nombre' =>  'Menú - Roles', 'menu_id' => $menu_linea_2, 'url' =>  'admin/_menus_rol', 'orden' => '3', 'icono' =>  'fas fa-chalkboard-teacher'],
            //['nombre' =>  'Permisos', 'menu_id' => $menu_linea_2, 'url' =>  'admin/permiso-index', 'orden' => '4', 'icono' =>  'fas fa-lock'],
            ['nombre' =>  'Permisos -Rol', 'menu_id' => $menu_linea_2, 'url' =>  'admin/_permiso-rol', 'orden' => '5', 'icono' =>  'fas fa-user-lock'],
            ['nombre' =>  'Usuarios', 'menu_id' => $menu_linea_2, 'url' =>  'admin/usuarios', 'orden' => '6', 'icono' =>  'fas fa-user-friends'],
            //------------------------------------------------------------------------------------------------------------
            //8
            ['nombre' =>  'Configuracion', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '3', 'icono' =>  'fas fa-cogs'],
            ['nombre' =>  'Areas', 'menu_id' => $menu_linea_3, 'url' =>  'admin/areas', 'orden' => '1', 'icono' =>  'fas fa-sitemap'],
            ['nombre' =>  'Cargos', 'menu_id' => $menu_linea_3, 'url' =>  'admin/cargos', 'orden' => '2', 'icono' =>  'fas fa-bezier-curve'],
            ['nombre' =>  'Contratos', 'menu_id' => $menu_linea_3, 'url' =>  'admin/contratos', 'orden' => '3', 'icono' =>  'fas fa-file-csv'],
            ['nombre' =>  'Centros de Costo', 'menu_id' => $menu_linea_3, 'url' =>  'admin/centros', 'orden' => '4', 'icono' =>  'fas fa-closed-captioning'],
            ['nombre' =>  'Estados', 'menu_id' => $menu_linea_3, 'url' =>  'admin/estados', 'orden' => '5', 'icono' =>  'fas fa-spell-check'],
            ['nombre' =>  'Categorias', 'menu_id' => $menu_linea_3, 'url' =>  'admin/categorias', 'orden' => '6', 'icono' =>  'fas fa-layer-group'],
            ['nombre' =>  'Matriz Caracteristicas PC', 'menu_id' => $menu_linea_3, 'url' =>  'admin/matriz_caracteristicas', 'orden' => '10', 'icono' =>  'fas fa-check-double'],
            //------------------------------------------------------------------------------------------------------------
            //16
            ['nombre' =>  'Inventarios', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '4', 'icono' =>  'fas fa-bezier-curve'],
            ['nombre' =>  'Equipos Propios', 'menu_id' => $menu_linea_4, 'url' =>  'admin/equipos', 'orden' => '7', 'icono' =>  'fas fa-laptop'],
            ['nombre' =>  'Monitores', 'menu_id' => $menu_linea_4, 'url' =>  'admin/monitores', 'orden' => '8', 'icono' =>  'fas fa-tv'],
            ['nombre' =>  'Impresoras', 'menu_id' => $menu_linea_4, 'url' =>  'admin/impresoras', 'orden' => '9', 'icono' =>  'fas fa-print'],

            //------------------------------------------------------------------------------------------------------------
            //20
            ['nombre' =>  'Otras opciones', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '4', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Nuestas políticas de datos', 'menu_id' => $menu_linea_5, 'url' =>  'usuario/consulta-politicas', 'orden' => '1', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Ayuda', 'menu_id' => $menu_linea_5, 'url' =>  'usuario/ayuda', 'orden' => '2', 'icono' =>  'fas fa-question-circle'],
            ['nombre' =>  'Actualizar datos', 'menu_id' => $menu_linea_5, 'url' =>  'usuario/actualizar-datos', 'orden' => '3', 'icono' =>  'fas fa-edit'],
            ['nombre' =>  'Cambiar contraseña', 'menu_id' => $menu_linea_5, 'url' =>  'usuario/cambiar-password', 'orden' => '4', 'icono' =>  'fas fa-key'],
            //------------------------------------------------------------------------------------------------------------
            //25
            ['nombre' =>  'Parametros', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '5', 'icono' =>  'fas fa-cog'],

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
