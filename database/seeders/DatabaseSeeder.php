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
            'dominio_empresas', 'usuarios','permiso_cargos','categorias','matriz_caracteristicas','proveedor_rentados',
            'centro_costos','sub_centro_costos','rentado_responsables','rentado_asignados','rentado_estados','rentado_tipos',
<<<<<<< HEAD
            'equipo_rentados','asignacion_rentados','gestionas','empresas','empleados','retiros','cuenta_corporativas','empleado_cuentas',
            'licencias','matriz_cargos','matriz_perfis']);
=======
            'equipo_rentados','asignacion_rentados','gestionas','empresas','empleados','retiros','dominio_correos','pago_correo_corporativo',
            'correos','dominio_daddies'
            ]);
>>>>>>> 632e140 (se suben archivos por primera vez)
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
        $this->call(CentroCostoSeeder::class);
        $this->call(SubCentroCostoSeeder::class);
        $this->call(RentadoResponsableSeeder::class);
        $this->call(RentadoAsignadoSeeder::class);
        $this->call(RentadoEstadoSeeder::class);
        $this->call(RentadoTipoSeeder::class);
        $this->call(EquipoRentadoSeeder::class);
        $this->call(AsignacionRentadoSeeder::class);
        $this->call(GestionaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(RetiroSeeder::class);
<<<<<<< HEAD
        $this->call(CuentaCorporativaSeeder::class);
        $this->call(EmpleadoCuentasSeeder::class);
        $this->call(Tabla_Licencias::class);
        $this->call(MatrizCargoSeeder::class);
        $this->call(MatrizPerfiSeeder::class);

=======
        $this->call(DominioCorreoSeeder::class);
        $this->call(PagoCorreoSeeder::class);
        $this->call(CorreoSeeder::class);
        $this->call(DominioDaddySeeder::class);
        
>>>>>>> 632e140 (se suben archivos por primera vez)
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
