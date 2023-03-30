<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Tabla_TipoAccion;
use Database\Seeders\Tabla_UnidadNegocio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'docutipos', 'roles', 'menu', 'menu_rol', 'icono', 'parametros', 'areas', 'cargos','contratos','centros',
            'dominio_empresas', 'usuarios','permiso_cargos','categorias','matriz_caracteristicas','proveedor_rentados']);
        // --------------------------------------------------------------------------------------------------
        $this->call(Tabla_DocuTipos::class);
        $this->call(Tabla_Roles::class);
        $this->call(Tabla_Menu::class);
        $this->call(Tabla_MenuRol::class);
        $this->call(Tabla_Icono::class);
        $this->call(Tabla_Parametros::class);
        $this->call(Tabla_Usuarios::class);
        $this->call(AreaSeeder::class);
        $this->call(Tabla_Cargo::class);
        $this->call(Tabla_PermisoCargoMenu::class);
        $this->call(Tabla_Categorias::class);
        $this->call(DominioEmpresaSeeder::class);
        $this->call(Tabla_Contratos::class);
        $this->call(Tabla_Centros::class);
        $this->call(MatrizCaracteristicaSeeder::class);
        $this->call(ProveedorRentadoSeeder::class);
    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
