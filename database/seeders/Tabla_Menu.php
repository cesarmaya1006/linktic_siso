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
        $menu_linea_4 =22;
        $menu_linea_5 =28;
        $menu_linea_6 =35;
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
            ['nombre' =>  'Dominios Correos', 'menu_id' => $menu_linea_3, 'url' =>  'admin/dominios_correos', 'orden' => '5', 'icono' =>  'fas fa-spell-check'],
            ['nombre' =>  'Categorias', 'menu_id' => $menu_linea_3, 'url' =>  'admin/categorias', 'orden' => '6', 'icono' =>  'fas fa-layer-group'],
            ['nombre' =>  'Proveedores Rentados', 'menu_id' => $menu_linea_3, 'url' =>  'admin/proveedores_rentados', 'orden' => '7', 'icono' =>  'fas fa-user-friends'],
            ['nombre' =>  'Sub - Centros de Costo', 'menu_id' => $menu_linea_3, 'url' =>  'admin/sub_centros_costo', 'orden' => '8', 'icono' =>  'fas fa-hand-holding-usd'],
            ['nombre' =>  'Responsables Rentados PC', 'menu_id' => $menu_linea_3, 'url' =>  'admin/responsables', 'orden' => '9', 'icono' =>  'fas fa-user-shield'],
            ['nombre' =>  'Tipos PC Rentados', 'menu_id' => $menu_linea_3, 'url' =>  'admin/tipos_rentados', 'orden' => '10', 'icono' =>  'fas fa-server'],
            ['nombre' =>  'Estados PC Rentados', 'menu_id' => $menu_linea_3, 'url' =>  'admin/rentados_estados', 'orden' => '11', 'icono' =>  'fas fa-spell-check'],
            ['nombre' =>  'Empresas', 'menu_id' => $menu_linea_3, 'url' =>  'admin/empresas', 'orden' => '12', 'icono' =>  'fas fa-industry'],
            ['nombre' =>  'Gestion', 'menu_id' => $menu_linea_3, 'url' =>  'admin/gestion', 'orden' => '13', 'icono' =>  'fas fa-chart-pie'],
            //------------------------------------------------------------------------------------------------------------
            //22
            ['nombre' =>  'Inventarios', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '4', 'icono' =>  'fas fa-bezier-curve'],
            ['nombre' =>  'Equipos Propios', 'menu_id' => $menu_linea_4, 'url' =>  'admin/equipos', 'orden' => '1', 'icono' =>  'fas fa-laptop'],
            ['nombre' =>  'Monitores', 'menu_id' => $menu_linea_4, 'url' =>  'admin/monitores', 'orden' => '2', 'icono' =>  'fas fa-tv'],
            ['nombre' =>  'Impresoras', 'menu_id' => $menu_linea_4, 'url' =>  'admin/impresoras', 'orden' => '3', 'icono' =>  'fas fa-print'],
            ['nombre' =>  'Matriz Caracteristicas PC', 'menu_id' => $menu_linea_4, 'url' =>  'admin/matriz_caracteristicas', 'orden' => '4', 'icono' =>  'fas fa-check-double'],
            ['nombre' =>  'Equipos rentados', 'menu_id' => $menu_linea_4, 'url' =>  'admin/equipos_rentados', 'orden' => '5', 'icono' =>  'fas fa-laptop-house'],
            //['nombre' =>  'Rentados - Asignación', 'menu_id' => $menu_linea_4, 'url' =>  'admin/asignacion_equipos_rentados', 'orden' => '6', 'icono' =>  'fas fa-user-check'],

            //------------------------------------------------------------------------------------------------------------
            //28
            ['nombre' =>  'Menu Matrices', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '5', 'icono' =>  'fas fa-bezier-curve'],
            ['nombre' =>  'Matriz Empleados', 'menu_id' => $menu_linea_5, 'url' =>  'admin/empleados', 'orden' => '1', 'icono' =>  'fas fa-user-tie'],
            ['nombre' =>  'Matriz de Retiros', 'menu_id' => $menu_linea_5, 'url' =>  'admin/retiros', 'orden' => '2', 'icono' =>  'fas fa-user-alt-slash'],
            ['nombre' =>  'Matriz de Cargos', 'menu_id' => $menu_linea_5, 'url' =>  'admin/matriz_cargos', 'orden' => '3', 'icono' =>  'fas fa-sitemap'],
            ['nombre' =>  'Matriz de Perfiles', 'menu_id' => $menu_linea_5, 'url' =>  'admin/matriz_perfiles', 'orden' => '4', 'icono' =>  'far fa-user-circle'],
            ['nombre' =>  'Matriz Cuentas Corporativas', 'menu_id' => $menu_linea_5, 'url' =>  'admin/matriz_cuentas_corporativas', 'orden' => '5', 'icono' =>  'far fa-address-card'],
            ['nombre' =>  'Matriz Cargos Perfiles', 'menu_id' => $menu_linea_5, 'url' =>  'admin/matriz_cargos_perfiles', 'orden' => '6', 'icono' =>  'fas fa-user-friends'],
            //------------------------------------------------------------------------------------------------------------
            //35
            ['nombre' =>  'Otras opciones', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '7', 'icono' =>  'fas fa-question-circle'],
            //['nombre' =>  'Nuestas políticas de datos', 'menu_id' => $menu_linea_6, 'url' =>  'usuario/consulta-politicas', 'orden' => '1', 'icono' =>  'fas fa-question-circle'],
            //['nombre' =>  'Ayuda', 'menu_id' => $menu_linea_6, 'url' =>  'usuario/ayuda', 'orden' => '2', 'icono' =>  'fas fa-question-circle'],
            //['nombre' =>  'Actualizar datos', 'menu_id' => $menu_linea_6, 'url' =>  'usuario/actualizar-datos', 'orden' => '3', 'icono' =>  'fas fa-edit'],
            ['nombre' =>  'Cambiar contraseña', 'menu_id' => $menu_linea_6, 'url' =>  'cambiar-password', 'orden' => '4', 'icono' =>  'fas fa-key'],
            //------------------------------------------------------------------------------------------------------------
            //40
            //['nombre' =>  'Parametros', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '7', 'icono' =>  'fas fa-cog'],
            //----------------------------------------------------------------------------------------------------------------------
            //37
            ['nombre' =>  'Cuentas Corporativas', 'menu_id' => $menu_linea_3, 'url' =>  'admin/cuentas-corporativas', 'orden' => '14', 'icono' =>  'fas fa-address-card'],

            //38
            ['nombre' =>  'Correos', 'menu_id' => $menu_id, 'url' =>  '#', 'orden' => '6', 'icono' =>  'fas fa-cog'],
            ['nombre' =>  'Correos corporativos', 'menu_id' => '38', 'url' =>  'correos', 'orden' => '1', 'icono' =>  'fas fa-cog'],
            ['nombre' =>  'Pagos', 'menu_id' => '38', 'url' =>  'pagos', 'orden' => '2', 'icono' =>  'fas fa-cog'],
            ['nombre' =>  'Dominios GoDaddy', 'menu_id' => $menu_id, 'url' =>  'dominiosDaddy', 'orden' => '3', 'icono' =>  'fas fa-cog'],
            //['nombre' =>  'Dominios', 'menu_id' => $menu_linea_3, 'url' =>  'dominios', 'orden' => '14', 'icono' =>  'fas fa-cog'],
            ['nombre' =>  'Asignación de equipos', 'menu_id' => $menu_linea_5, 'url' =>  'asignacion_equipos', 'orden' => '7', 'icono' =>  'fas fa-laptop'],
            ['nombre' =>  'Licencias administradas', 'menu_id' => $menu_linea_5, 'url' =>  'licencias_administradas', 'orden' => '8', 'icono' =>  'fas fa-file-alt'],

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
