<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Intranet\Admin\RolController;
use App\Http\Controllers\Intranet\Admin\MenuController;
use App\Http\Controllers\Extranet\ExtranetPageController;
use App\Http\Controllers\Intranet\Admin\AjaxController;
use App\Http\Controllers\Intranet\Admin\MenuRolController;
use App\Http\Controllers\Intranet\Admin\PermisoController;
use App\Http\Controllers\Intranet\Admin\UsuarioController;
use App\Http\Controllers\Intranet\Admin\PermisoRolController;
use App\Http\Controllers\Intranet\Admin\IntranetPageCotroller;
use App\Http\Controllers\Intranet\Admin\CargoController;
use App\Http\Controllers\Intranet\Admin\AreaController;
use App\Http\Controllers\Intranet\Admin\CategoriaController;
use App\Http\Controllers\Intranet\Admin\CentroController;
use App\Http\Controllers\Intranet\Admin\ContratoController;
use App\Http\Controllers\Intranet\Admin\EstadoController;
use App\Http\Controllers\Intranet\Empresa\CaracteristicasController;
use App\Http\Controllers\Intranet\Empresa\CentrosCostosController;
use App\Http\Controllers\Intranet\Empresa\CuentaCorporativaController;
use App\Http\Controllers\Intranet\Empresa\CorreoController;
use App\Http\Controllers\Intranet\Empresa\DominioCorreoController;
use App\Http\Controllers\Intranet\Empresa\DominioDaddyController;
use App\Http\Controllers\Intranet\Empresa\EmpleadoController;
use App\Http\Controllers\Intranet\Empresa\EquipoController;
use App\Http\Controllers\Intranet\Empresa\EquiposRentadosAsignacionController;
use App\Http\Controllers\Intranet\Empresa\EquiposRentadosController;
use App\Http\Controllers\Intranet\Empresa\EquiposRentadosEstadosController;
use App\Http\Controllers\Intranet\Empresa\EquiposRentadosResponsableController;
use App\Http\Controllers\Intranet\Empresa\EquiposRentadosTiposController;
use App\Http\Controllers\Intranet\Empresa\ImpresoraController;
use App\Http\Controllers\Intranet\Empresa\MonitorController;
use App\Http\Controllers\Intranet\Empresa\ProveedoresRentadosController;
use App\Http\Controllers\Intranet\Empresa\SubCentrosCostosController;
use App\Http\Controllers\Intranet\Empresa\EmpresaController;
use App\Http\Controllers\Intranet\Empresa\GestionaController;
use App\Http\Controllers\Intranet\Empresa\MatrizCargoController;
use App\Http\Controllers\Intranet\Empresa\MatrizCuentaCorporativaController;
use App\Http\Controllers\Intranet\Empresa\MatrizPerfilController;
use App\Http\Controllers\Intranet\Empresa\PagoCorreosController;
use App\Http\Controllers\Intranet\Empresa\RetiroController;
use App\Models\Admin\Usuario;
use App\Models\Intranet\Empresa\DominioCorreo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
});
Route::get('/migrar-bd', function () {
    echo Artisan::call('migrate:refresh');
});
//---------------------------------------------------------------------------------
Route::get('/', [ExtranetPageController::class, 'index'])->name('index');
Route::get('/index', [ExtranetPageController::class, 'index'])->name('index_2');
Route::get('/solicitar_password', [ExtranetPageController::class,'solicitar_password',])->name('solicitar_password');
Route::post('/cambiar_password', [ExtranetPageController::class,'cambiar_password',])->name('cambiar_password');
Route::get('/preguntas_frecuentes', [ExtranetPageController::class,'preguntas_frecuentes',])->name('preguntas_frecuentes');
Route::get('/parametros', [ExtranetPageController::class, 'parametros'])->name('parametros');
Route::post('/parametros-guardar', [ExtranetPageController::class,'parametros_guardar',])->name('parametros-guardar');
Route::post('/cargar_tipo_documentos', [ExtranetPageController::class,'cargar_tipo_documentos',])->name('cargar_tipo_documentos');
//---------------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function () {
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //rutas ajax auth
    Route::get('cargar_cargos', [AjaxController::class, 'cargar_cargos'])->name('admin-cargar_cargos');
    Route::get('cargar_menu_permisos', [AjaxController::class, 'cargar_menu_permisos'])->name('admin-cargar_menu_permisos');
    Route::post('modificar_menu_permisos', [AjaxController::class, 'modificar_menu_permisos'])->name('admin-modificar_menu_permisos');
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'admin'], function () {
        Route::get('index', [IntranetPageCotroller::class, 'index'])->name('admin-index');
        Route::post('restablecer-password', [IntranetPageCotroller::class,'restablecer_password',])->name('admin-restablecer_password');
        // Rutas Index
        // ------------------------------------------------------------------------------------
        Route::group(['middleware' => 'adminSistema'], function () {
            // Ruta Administrador del Sistema Menus
            // ------------------------------------------------------------------------------------
            Route::get('menu-index', [MenuController::class, 'index'])->name('admin-menu-index');
            Route::get('menu-crear', [MenuController::class, 'crear'])->name('admin-menu-crear');
            Route::get('menu/{id}/editar', [MenuController::class,'editar',])->name('admin-menu-editar');
            Route::post('menu', [MenuController::class, 'guardar'])->name('admin-menu-guardar');
            Route::put('menu/{id}', [MenuController::class,'actualizar',])->name('admin-menu-actualizar');
            Route::get('menu/{id}/eliminar', [MenuController::class,'eliminar',])->name('admin-menu-eliminar');
            Route::get('menu-guardar-orden', [MenuController::class,'guardarOrden',])->name('admin-menu-guardar-orden');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Roles
            Route::get('rol-index', [RolController::class, 'index'])->name('admin-rol-index');
            Route::get('rol-crear', [RolController::class, 'crear'])->name('admin-rol-crear');
            Route::get('rol/{id}/editar', [RolController::class,'editar',])->name('admin-rol-editar');
            Route::post('rol', [RolController::class, 'guardar'])->name('admin-rol-guardar');
            Route::put('rol/{id}', [RolController::class, 'actualizar'])->name('admin-rol-actualizar');
            Route::delete('rol/{id}/eliminar', [RolController::class,'eliminar',])->name('admin-rol-eliminar');
            Route::get('roles/export/', [RolController::class,'exportarExcel',])->name('roles-exportarExcel');
            // ------------------------------------------------------------------------------------
            /*RUTAS Administrador del Sistema MENU_ROL*/
            Route::get('_menus_rol', [MenuRolController::class, 'index'])->name('admin-menu_rol');
            Route::post('_menus_rol', [MenuRolController::class,'guardar',])->name('admin-guardar_menu_rol');
            // ------------------------------------------------------------------------------------
            /*RUTAS DE PERMISO*/
            Route::get('permiso-index', [PermisoController::class,'index',])->name('admin-permiso-index');
            Route::get('permiso-crear/{pagVolver?}', [PermisoController::class,'crear',])->name('admin-crear_permiso');
            Route::post('permiso', [PermisoController::class, 'guardar'])->name('admin-guardar_permiso');
            Route::get('permiso/{id}/editar', [PermisoController::class,'editar',])->name('admin-editar_permiso');
            Route::put('permiso/{id}', [PermisoController::class,'actualizar',])->name('admin-actualizar_permiso');
            Route::delete('permiso/{id}', [PermisoController::class,'eliminar',])->name('admin-eliminar_permiso');
            // ------------------------------------------------------------------------------------
            /*RUTAS PERMISO_ROL*/
            Route::get('_permiso-rol', [PermisoRolController::class,'index',])->name('admin-permiso_rol');
            Route::post('_permiso-rol', [PermisoRolController::class,'guardar',])->name('admin-guardar_permiso_rol');

            // ------------------------------------------------------------------------------------
        });
        // ------------------------------------------------------------------------------------
        Route::group(['middleware' => 'administrador'], function () {
            // Ruta Administrador del Sistema Usuarios
            Route::get('usuario-index', [UsuarioController::class,'index',])->name('admin-usuario-index');
            Route::get('usuario-crear', [UsuarioController::class,'crear',])->name('admin-usuario-crear');
            Route::post('usuario', [UsuarioController::class, 'guardar'])->name('admin-usuario-guardar');
            Route::get('usuario/{id}/editar', [UsuarioController::class,'editar',])->name('admin-usuario-editar');
            Route::put('usuario/{id}', [UsuarioController::class,'actualizar',])->name('admin-usuario-actualizar');
            Route::delete('usuario/{id}', [UsuarioController::class,'eliminar',])->name('admin-usuario-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Areas
            Route::get('areas', [AreaController::class,'index',])->name('admin-areas');
            Route::get('areas-crear', [AreaController::class,'crear',])->name('admin-areas-crear');
            Route::post('areas', [AreaController::class, 'guardar'])->name('admin-areas-guardar');
            Route::get('areas/{id}/editar', [AreaController::class,'editar',])->name('admin-areas-editar');
            Route::put('areas/{id}', [AreaController::class,'actualizar',])->name('admin-areas-actualizar');
            Route::delete('areas/{id}', [AreaController::class,'eliminar',])->name('admin-areas-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Cargos
            Route::get('cargos', [CargoController::class,'index',])->name('admin-cargos');
            Route::get('cargos-crear', [CargoController::class,'crear',])->name('admin-cargos-crear');
            Route::post('cargos', [CargoController::class, 'guardar'])->name('admin-cargos-guardar');
            Route::get('cargos/{id}/editar', [CargoController::class,'editar',])->name('admin-cargos-editar');
            Route::put('cargos/{id}', [CargoController::class,'actualizar',])->name('admin-cargos-actualizar');
            Route::delete('cargos/{id}', [CargoController::class,'eliminar',])->name('admin-cargos-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Contratos
            Route::get('contratos', [ContratoController::class,'index',])->name('admin-contratos');
            Route::get('contratos-crear', [ContratoController::class,'crear',])->name('admin-contratos-crear');
            Route::post('contratos', [ContratoController::class, 'guardar'])->name('admin-contratos-guardar');
            Route::get('contratos/{id}/editar', [ContratoController::class,'editar',])->name('admin-contratos-editar');
            Route::put('contratos/{id}', [ContratoController::class,'actualizar',])->name('admin-contratos-actualizar');
            Route::delete('contratos/{id}', [ContratoController::class,'eliminar',])->name('admin-contratos-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Centros de costo
            Route::get('centros', [CentroController::class,'index',])->name('admin-centros');
            Route::get('centros-crear', [CentroController::class,'crear',])->name('admin-centros-crear');
            Route::post('centros', [CentroController::class, 'guardar'])->name('admin-centros-guardar');
            Route::get('centros/{id}/editar', [CentroController::class,'editar',])->name('admin-centros-editar');
            Route::put('centros/{id}', [CentroController::class,'actualizar',])->name('admin-centros-actualizar');
            Route::delete('centros/{id}', [CentroController::class,'eliminar',])->name('admin-centros-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Estado Elementos
            Route::get('estados', [EstadoController::class,'index',])->name('admin-estados');
            Route::get('estados-crear', [EstadoController::class,'crear',])->name('admin-estados-crear');
            Route::post('estados', [EstadoController::class, 'guardar'])->name('admin-estados-guardar');
            Route::get('estados/{id}/editar', [EstadoController::class,'editar',])->name('admin-estados-editar');
            Route::put('estados/{id}', [EstadoController::class,'actualizar',])->name('admin-estados-actualizar');
            Route::delete('estados/{id}', [EstadoController::class,'eliminar',])->name('admin-estados-eliminar');
            // ------------------------------------------------------------------------------------
            // Rutas usuarios
            Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios-index');
            Route::get('usuarios/importar', [UsuarioController::class, 'importar'])->name('usuarios-importar');
            Route::post('usuarios/import',[UsuarioController::class,'import'])->name('usuarios-import');
            Route::get('usuarios/cargar/{id}',[UsuarioController::class,'cargar'])->name('usuarios-cargar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Categorias
            Route::get('categorias', [CategoriaController::class,'index',])->name('admin-categorias');
            Route::get('categorias-crear', [CategoriaController::class,'crear',])->name('admin-categorias-crear');
            Route::post('categorias', [CategoriaController::class, 'guardar'])->name('admin-categorias-guardar');
            Route::get('categorias/{id}/editar', [CategoriaController::class,'editar',])->name('admin-categorias-editar');
            Route::put('categorias/{id}', [CategoriaController::class,'actualizar',])->name('admin-categorias-actualizar');
            Route::delete('categorias/{id}', [CategoriaController::class,'eliminar',])->name('admin-categorias-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Empresas
            Route::get('empresas', [EmpresaController::class,'index',])->name('admin-empresas');
            Route::get('empresas-crear', [EmpresaController::class,'crear',])->name('admin-empresas-crear');
            Route::post('empresas', [EmpresaController::class, 'guardar'])->name('admin-empresas-guardar');
            Route::get('empresas/{id}/editar', [EmpresaController::class,'editar',])->name('admin-empresas-editar');
            Route::put('empresas/{id}', [EmpresaController::class,'actualizar',])->name('admin-empresas-actualizar');
            Route::delete('empresas/{id}', [EmpresaController::class,'eliminar',])->name('admin-empresas-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Gestion
            Route::get('gestion', [GestionaController::class,'index',])->name('admin-gestion');
            Route::get('gestion-crear', [GestionaController::class,'crear',])->name('admin-gestion-crear');
            Route::post('gestion', [GestionaController::class, 'guardar'])->name('admin-gestion-guardar');
            Route::get('gestion/{id}/editar', [GestionaController::class,'editar',])->name('admin-gestion-editar');
            Route::put('gestion/{id}', [GestionaController::class,'actualizar',])->name('admin-gestion-actualizar');
            Route::delete('gestion/{id}', [GestionaController::class,'eliminar',])->name('admin-gestion-eliminar');

        });
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Equipos
            Route::get('equipos', [EquipoController::class,'index',])->name('admin-equipos');
            Route::get('equipos-crear', [EquipoController::class,'crear',])->name('admin-equipos-crear');
            Route::post('equipos', [EquipoController::class, 'guardar'])->name('admin-equipos-guardar');
            Route::get('equipos/{id}/editar', [EquipoController::class,'editar',])->name('admin-equipos-editar');
            Route::put('equipos/{id}', [EquipoController::class,'actualizar',])->name('admin-equipos-actualizar');
            Route::delete('equipos/{id}', [EquipoController::class,'eliminar',])->name('admin-equipos-eliminar');
            // ------------------------------------------------------------------------------------
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Equipos
            Route::get('monitores', [MonitorController::class,'index',])->name('admin-monitores');
            Route::get('monitores-crear', [MonitorController::class,'crear',])->name('admin-monitores-crear');
            Route::post('monitores', [MonitorController::class, 'guardar'])->name('admin-monitores-guardar');
            Route::get('monitores/{id}/editar', [MonitorController::class,'editar',])->name('admin-monitores-editar');
            Route::put('monitores/{id}', [MonitorController::class,'actualizar',])->name('admin-monitores-actualizar');
            Route::delete('monitores/{id}', [MonitorController::class,'eliminar',])->name('admin-monitores-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Sistema Impresora
            Route::get('impresoras', [ImpresoraController::class,'index',])->name('admin-impresoras');
            Route::get('impresoras-crear', [ImpresoraController::class,'crear',])->name('admin-impresoras-crear');
            Route::post('impresoras', [ImpresoraController::class, 'guardar'])->name('admin-impresoras-guardar');
            Route::get('impresoras/{id}/editar', [ImpresoraController::class,'editar',])->name('admin-impresoras-editar');
            Route::put('impresoras/{id}', [ImpresoraController::class,'actualizar',])->name('admin-impresoras-actualizar');
            Route::delete('impresoras/{id}', [ImpresoraController::class,'eliminar',])->name('admin-impresoras-eliminar');
            // ------------------------------------------------------------------------------------
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del Caracteristicas
            Route::get('matriz_caracteristicas', [CaracteristicasController::class,'index',])->name('admin-matriz_caracteristicas');
            Route::get('matriz_caracteristicas-crear', [CaracteristicasController::class,'crear',])->name('admin-matriz_caracteristicas-crear');
            Route::post('matriz_caracteristicas', [CaracteristicasController::class, 'guardar'])->name('admin-matriz_caracteristicas-guardar');
            Route::get('matriz_caracteristicas/{id}/editar', [CaracteristicasController::class,'editar',])->name('admin-matriz_caracteristicas-editar');
            Route::put('matriz_caracteristicas/{id}', [CaracteristicasController::class,'actualizar',])->name('admin-matriz_caracteristicas-actualizar');
            Route::delete('matriz_caracteristicas/{id}', [CaracteristicasController::class,'eliminar',])->name('admin-matriz_caracteristicas-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador de proveedores equipos rentados
            Route::get('proveedores_rentados', [ProveedoresRentadosController::class,'index',])->name('admin-proveedores_rentados');
            Route::get('proveedores_rentados-crear', [ProveedoresRentadosController::class,'crear',])->name('admin-proveedores_rentados-crear');
            Route::post('proveedores_rentados', [ProveedoresRentadosController::class, 'guardar'])->name('admin-proveedores_rentados-guardar');
            Route::get('proveedores_rentados/{id}/editar', [ProveedoresRentadosController::class,'editar',])->name('admin-proveedores_rentados-editar');
            Route::put('proveedores_rentados/{id}', [ProveedoresRentadosController::class,'actualizar',])->name('admin-proveedores_rentados-actualizar');
            Route::delete('proveedores_rentados/{id}', [ProveedoresRentadosController::class,'eliminar',])->name('admin-proveedores_rentados-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador de proveedores centros de costo
            Route::get('centros_costo', [CentrosCostosController::class,'index',])->name('admin-centros_costo');
            Route::get('centros_costo-crear', [CentrosCostosController::class,'crear',])->name('admin-centros_costo-crear');
            Route::post('centros_costo', [CentrosCostosController::class, 'guardar'])->name('admin-centros_costo-guardar');
            Route::get('centros_costo/{id}/editar', [CentrosCostosController::class,'editar',])->name('admin-centros_costo-editar');
            Route::put('centros_costo/{id}', [CentrosCostosController::class,'actualizar',])->name('admin-centros_costo-actualizar');
            Route::delete('centros_costo/{id}', [CentrosCostosController::class,'eliminar',])->name('admin-centros_costo-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador de proveedores sub centros de costo
            Route::get('sub_centros_costo', [SubCentrosCostosController::class,'index',])->name('admin-sub_centros_costo');
            Route::get('sub_centros_costo-crear', [SubCentrosCostosController::class,'crear',])->name('admin-sub_centros_costo-crear');
            Route::post('sub_centros_costo', [SubCentrosCostosController::class, 'guardar'])->name('admin-sub_centros_costo-guardar');
            Route::get('sub_centros_costo/{id}/editar', [SubCentrosCostosController::class,'editar',])->name('admin-sub_centros_costo-editar');
            Route::put('sub_centros_costo/{id}', [SubCentrosCostosController::class,'actualizar',])->name('admin-sub_centros_costo-actualizar');
            Route::delete('sub_centros_costo/{id}', [SubCentrosCostosController::class,'eliminar',])->name('admin-sub_centros_costo-eliminar');
            Route::get('sub_centros_costo_consecutivo', [SubCentrosCostosController::class,'cargar_concecutivo',])->name('sub_centros_costo_consecutivo');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador de rentados sub responsables
            Route::get('responsables', [EquiposRentadosResponsableController::class,'index',])->name('admin-responsables');
            Route::get('responsables-crear', [EquiposRentadosResponsableController::class,'crear',])->name('admin-responsables-crear');
            Route::post('responsables', [EquiposRentadosResponsableController::class, 'guardar'])->name('admin-responsables-guardar');
            Route::get('responsables/{id}/editar', [EquiposRentadosResponsableController::class,'editar',])->name('admin-responsables-editar');
            Route::put('responsables/{id}', [EquiposRentadosResponsableController::class,'actualizar',])->name('admin-responsables-actualizar');
            Route::delete('responsables/{id}', [EquiposRentadosResponsableController::class,'eliminar',])->name('admin-responsables-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador de rentados estados
            Route::get('tipos_rentados', [EquiposRentadosTiposController::class,'index',])->name('admin-tipos_rentados');
            Route::get('tipos_rentados-crear', [EquiposRentadosTiposController::class,'crear',])->name('admin-tipos_rentados-crear');
            Route::post('tipos_rentados', [EquiposRentadosTiposController::class, 'guardar'])->name('admin-tipos_rentados-guardar');
            Route::get('tipos_rentados/{id}/editar', [EquiposRentadosTiposController::class,'editar',])->name('admin-tipos_rentados-editar');
            Route::put('tipos_rentados/{id}', [EquiposRentadosTiposController::class,'actualizar',])->name('admin-tipos_rentados-actualizar');
            Route::delete('tipos_rentados/{id}', [EquiposRentadosTiposController::class,'eliminar',])->name('admin-tipos_rentados-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador de rentados tipos
            Route::get('rentados_estados', [EquiposRentadosEstadosController::class,'index',])->name('admin-rentados_estados');
            Route::get('rentados_estados-crear', [EquiposRentadosEstadosController::class,'crear',])->name('admin-rentados_estados-crear');
            Route::post('rentados_estados', [EquiposRentadosEstadosController::class, 'guardar'])->name('admin-rentados_estados-guardar');
            Route::get('rentados_estados/{id}/editar', [EquiposRentadosEstadosController::class,'editar',])->name('admin-rentados_estados-editar');
            Route::put('rentados_estados/{id}', [EquiposRentadosEstadosController::class,'actualizar',])->name('admin-rentados_estados-actualizar');
            Route::delete('rentados_estados/{id}', [EquiposRentadosEstadosController::class,'eliminar',])->name('admin-rentados_estados-eliminar');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del equipos rentados
            Route::get('equipos_rentados', [EquiposRentadosController::class,'index',])->name('admin-equipos_rentados');
            Route::get('equipos_rentados-crear', [EquiposRentadosController::class,'crear',])->name('admin-equipos_rentados-crear');
            Route::post('equipos_rentados', [EquiposRentadosController::class, 'guardar'])->name('admin-equipos_rentados-guardar');
            Route::get('equipos_rentados/{id}/editar', [EquiposRentadosController::class,'editar',])->name('admin-equipos_rentados-editar');
            Route::put('equipos_rentados/{id}', [EquiposRentadosController::class,'actualizar',])->name('admin-equipos_rentados-actualizar');
            Route::delete('equipos_rentados/{id}', [EquiposRentadosController::class,'eliminar',])->name('admin-equipos_rentados-eliminar');
            Route::post('equipos_rentados_proveedor', [EquiposRentadosController::class, 'guardar_proveedor'])->name('equipos_rentados_guardar_proveedor');
            Route::post('equipos_rentados_centro', [EquiposRentadosController::class, 'guardar_centro'])->name('equipos_rentados_guardar_centro');
            Route::post('equipos_rentados_sub_centro', [EquiposRentadosController::class, 'guardar_sub_centro'])->name('equipos_rentados_guardar_sub_centro');
            Route::get('equipos_rentados_cargar_subcentro', [EquiposRentadosController::class,'cargar_subcentro',])->name('cargar_subcentro');
            Route::post('equipos_rentados_responsable', [EquiposRentadosController::class, 'guardar_responsable'])->name('equipos_rentados_guardar_responsable');
            Route::post('equipos_rentados_tipo', [EquiposRentadosController::class, 'guardar_tipo'])->name('equipos_rentados_guardar_tipo');
            Route::get('devolver_asignado_proveedor/{id}', [EquiposRentadosAsignacionController::class,'devolver_asignado_proveedor',])->name('devolver_asignado_proveedor');
            Route::post('devolver_asignado_proveedor/{id}/devolver', [EquiposRentadosAsignacionController::class,'devolver_asignado_proveedor_devolver',])->name('devolver_asignado_proveedor_devolver');
            Route::get('devolver_asignado_bodega/{id}', [EquiposRentadosAsignacionController::class,'devolver_asignadobodega',])->name('devolver_asignado_bodega');
            Route::post('devolver_asignado_bodega/{id}/devolver', [EquiposRentadosAsignacionController::class,'devolver_asignadobodega_devolver',])->name('devolver_asignado_bodega_devolver');
            // ------------------------------------------------------------------------------------
            // Ruta Administrador del equipos rentados - asignacion
            Route::get('asignacion_equipos_rentados', [EquiposRentadosAsignacionController::class,'index',])->name('admin-equipos_rentados_asignacion');
            Route::get('asignacion_equipos_rentados-crear', [EquiposRentadosAsignacionController::class,'crear',])->name('admin-equipos_rentados_asignacion-crear');
            Route::get('asignacion_equipos_rentados/{id}/asignar', [EquiposRentadosAsignacionController::class,'asignar',])->name('admin-equipos_rentados_asignacion-asignar');
            Route::post('asignacion_equipos_rentados_asignado', [EquiposRentadosAsignacionController::class, 'guardar_asignado'])->name('equipos_rentados_asignacion_guardar_asignado');
            Route::post('asignacion_equipos_rentados/asignar_guardar', [EquiposRentadosAsignacionController::class, 'asignar_guardar'])->name('admin-equipos_rentados_asignacion-guardar');

            Route::put('asignacion_equipos_rentados/{id}', [EquiposRentadosAsignacionController::class,'actualizar',])->name('admin-equipos_rentados_asignacion-actualizar');
            Route::delete('asignacion_equipos_rentados/{id}', [EquiposRentadosAsignacionController::class,'eliminar',])->name('admin-equipos_rentados_asignacion-eliminar');
            // ------------------------------------------------------------------------------------
            // ------------------------------------------------------------------------------------
            // Ruta Administrador
            Route::get('empleados', [EmpleadoController::class,'index',])->name('empleados');
            Route::get('empleados-crear', [EmpleadoController::class,'crear',])->name('empleados-crear');
            Route::post('empleados', [EmpleadoController::class, 'guardar'])->name('empleados-guardar');
            Route::get('empleados/{id}/editar', [EmpleadoController::class,'editar',])->name('empleados-editar');
            Route::put('empleados/{id}', [EmpleadoController::class,'actualizar',])->name('empleados-actualizar');
            Route::delete('empleados/{id}', [EmpleadoController::class,'eliminar',])->name('empleados-eliminar');
            Route::get('empleados/{id}/retirar', [EmpleadoController::class,'retirar_empleado',])->name('empleados-retirar');
            Route::post('empleados/{id}/retirar', [EmpleadoController::class,'retiro_empleado',])->name('empleados-retiro');
            Route::get('empleados/retiro_confirmacion', [EmpleadoController::class,'retiro_confirmacion',])->name('retiro_confirmacion');
            Route::get('empleados/get_equipos_rentados/{id}', [EmpleadoController::class,'get_equipos_rentados',])->name('get_equipos_rentados');
            Route::get('empleados/get_equipos_propios/{id}', [EmpleadoController::class,'get_equipos_propios',])->name('get_equipos_propios');
            Route::get('empleados/get_cuentas_corporativas/{id}', [EmpleadoController::class,'get_cuentas_corporativas',])->name('get_cuentas_corporativas');
            Route::get('empleados/get_licencias_corporativas/{id}', [EmpleadoController::class,'get_licencias_corporativas',])->name('get_licencias_corporativas');
            Route::get('empleados/get_impresoras/{id}', [EmpleadoController::class,'get_impresoras',])->name('get_impresoras');
            Route::get('empleados/get_monitores/{id}', [EmpleadoController::class,'get_monitores',])->name('get_monitores');
            Route::get('empleados/get_otros/{id}', [EmpleadoController::class,'get_otros',])->name('get_otros');
            Route::post('licencias-corporativas/{empleado_id}/{licencia_id}/asignar', [EmpleadoController::class, 'asignar_licencias'])->name('admin-licencias_corporativas-asignar');
            // Ruta Administrador empleados
            Route::get('retiros', [RetiroController::class,'index',])->name('retiros');
            // Ruta Administrador cargos
            Route::get('matriz_cargos', [MatrizCargoController::class,'index',])->name('matriz_cargos');
            Route::get('matriz_cargos-crear', [MatrizCargoController::class,'crear',])->name('admin-matriz_cargos-crear');
            Route::post('matriz_cargos', [MatrizCargoController::class, 'guardar'])->name('admin-matriz_cargos-guardar');
            Route::get('matriz_cargos/{id}/editar', [MatrizCargoController::class,'editar',])->name('admin-matriz_cargos-editar');
            Route::put('matriz_cargos/{id}', [MatrizCargoController::class,'actualizar',])->name('admin-matriz_cargos-actualizar');
            Route::delete('matriz_cargos/{id}', [MatrizCargoController::class,'eliminar',])->name('admin-matriz_cargos-eliminar');
            // Ruta Administrador perfilES
            Route::get('matriz_perfiles', [MatrizPerfilController::class,'index',])->name('matriz_perfiles');
            Route::get('matriz_perfiles-crear', [MatrizPerfilController::class,'crear',])->name('admin-matriz_perfiles-crear');
            Route::post('matriz_perfiles', [MatrizPerfilController::class, 'guardar'])->name('admin-matriz_perfiles-guardar');
            Route::get('matriz_perfiles/{id}/editar', [MatrizPerfilController::class,'editar',])->name('admin-matriz_perfiles-editar');
            Route::put('matriz_perfiles/{id}', [MatrizPerfilController::class,'actualizar',])->name('admin-matriz_perfiles-actualizar');
            Route::delete('matriz_perfiles/{id}', [MatrizPerfilController::class,'eliminar',])->name('admin-matriz_perfiles-eliminar');
            // Ruta Administrador Matriz Cuentas Corporativas
            Route::get('matriz_cuentas_corporativas', [MatrizCuentaCorporativaController::class,'index',])->name('matriz_cuentas_corporativas');
            Route::post('matriz_cuentas_corporativas-asignacion/{matriz_cargo_id}/{cuenta_corporativa_id}', [MatrizCuentaCorporativaController::class,'asignacion',])->name('matriz_cuentas_corporativas_asignacion');
            Route::post('matriz_cuentas_corporativas-desasignacion/{matriz_cargo_id}/{cuenta_corporativa_id}', [MatrizCuentaCorporativaController::class,'desasignacion',])->name('matriz_cuentas_corporativas_desasignacion');
            // Ruta Administrador Matriz Cargos Perfiles
            Route::get('matriz_cargos_perfiles', [MatrizCuentaCorporativaController::class,'index',])->name('matriz_cargo_perfiles');
            Route::post('matriz_cargos_perfiles-asignacion/{matriz_cargo_id}/{cuenta_corporativa_id}', [MatrizCuentaCorporativaController::class,'asignacion',])->name('matriz_cargos_perfiles_asignacion');
            Route::post('matriz_cargos_perfiles-desasignacion/{matriz_cargo_id}/{cuenta_corporativa_id}', [MatrizCuentaCorporativaController::class,'desasignacion',])->name('matriz_cargos_perfiles_desasignacion');

            //Rutas Empleados/equipos rentados
            Route::get('empleados/equipos_rentados/{id}/asignar', [EmpleadoController::class,'equipos_rentados_asignar',])->name('equipos_rentados_asignar');
            Route::post('empleados/equipos_rentados/{empleado_id}/{equipo_rentado_id}/asignacion', [EmpleadoController::class,'equipos_rentados_asignacion',])->name('equipos_rentados_asignacion');
            //Rutas Empleados/impresoras
            Route::get('empleados/impresoras/{id}/asignar', [EmpleadoController::class,'impresoras_asignar',])->name('impresoras_asignar');
            Route::post('empleados/impresoras/{empleado_id}/{glpi_printers_id}/asignacion', [EmpleadoController::class,'impresoras_asignacion',])->name('impresoras_asignacion');
            //Rutas Empleados/monitores
            Route::get('empleados/monitores/{id}/asignar', [EmpleadoController::class,'monitores_asignar',])->name('monitores_asignar');
            Route::post('empleados/monitores/{empleado_id}/{glpi_monitors_id}/asignacion', [EmpleadoController::class,'monitores_asignacion',])->name('monitores_asignacion');
            //Rutas Empleados/Otros Elementos
            Route::get('empleados/otros/{id}/asignar', [EmpleadoController::class,'otros_asignar',])->name('otros_asignar');
            Route::post('empleados/otros/asignacion/{id}', [EmpleadoController::class,'otros_asignacion',])->name('otros_asignacion');
            //Rutas Empleados/equipos propios
            Route::get('empleados/equipos_propios/{id}/asignar', [EmpleadoController::class,'equipos_propios_asignar',])->name('equipos_propios_asignar');
            Route::post('empleados/equipos_propios/{empleado_id}/{glpi_computers_id}/asignacion', [EmpleadoController::class,'equipos_propios_asignacion',])->name('equipos_propios_asignacion');
            // Rutas cuentas corporativas
            Route::get('cuentas-corporativas', [CuentaCorporativaController::class,'index',])->name('admin-cuentas_corporativas');
            Route::get('cuentas-corporativas-crear', [CuentaCorporativaController::class,'crear',])->name('admin-cuentas_corporativas-crear');
            Route::post('cuentas-corporativas', [CuentaCorporativaController::class, 'guardar'])->name('admin-cuentas_corporativas-guardar');
            Route::get('cuentas-corporativas/{id}/editar', [CuentaCorporativaController::class,'editar',])->name('admin-cuentas_corporativas-editar');
            Route::put('cuentas-corporativas/{id}', [CuentaCorporativaController::class,'actualizar',])->name('admin-cuentas_corporativas-actualizar');
            Route::delete('cuentas-corporativas/{id}', [CuentaCorporativaController::class,'eliminar',])->name('admin-cuentas_corporativas-eliminar');
            Route::post('cuentas-corporativas/{empleado_id}/{cuenta_corporativa_id}/asignar', [CuentaCorporativaController::class, 'asignar'])->name('admin-cuentas_corporativas-asignar');
                  // ------------------------------------------------------------------------------------


    });
     // Ruta Administrador del Sistema Correos
     Route::get('correos', [CorreoController::class,'index',])->name('correos');
     Route::get('correos-create', [CorreoController::class,'create',])->name('correos-create');
     Route::post('correos-store', [CorreoController::class, 'store'])->name('admin-correos-store');
     Route::get('correos/{id}/editar', [CorreoController::class,'update',])->name('admin-correos-editar');
     Route::put('correos/{id}', [CorreoController::class,'edit',])->name('correos-actualizar');
     Route::delete('correos/{id}', [CorreoController::class,'destroy',])->name('admin-correos-eliminar');

       // Ruta Administrador de pagos. mover el controlador
       Route::get('pagos', [PagoCorreosController::class,'index',])->name('pagos');
       Route::get('pagos-create', [PagoCorreosController::class,'create',])->name('pagos-create');
       Route::post('pagos-store', [PagoCorreosController::class, 'store'])->name('admin-pagos-store');
       Route::get('pagos/{id}/editar', [PagoCorreosController::class,'update',])->name('pagos-editar');
       Route::put('pagos/{id}', [PagoCorreosController::class,'edit',])->name('pagos-actualizar');
       Route::delete('pagos/{id}', [PagoCorreosController::class,'destroy',])->name('pagos-eliminar');



         // Ruta Administrador de las rutas
         Route::get('dominios', [DominioCorreoController::class,'index',])->name('dominios');
         Route::get('dominios-create', [DominioCorreoController::class,'create',])->name('dominios-create');
         Route::post('dominios-store', [DominioCorreoController::class, 'store'])->name('admin-dominios-store');
         Route::get('dominios/{id}/editar', [DominioCorreoController::class,'update',])->name('admin-dominios-editar');
         Route::put('dominios/{id}', [DominioCorreoController::class,'edit',])->name('dominios-actualizar');
         Route::delete('dominios/{id}', [DominioCorreoController::class,'destroy',])->name('admin-dominios-eliminar');


            // Ruta Administrador de las rutas
            Route::get('dominiosDaddy', [DominioDaddyController::class,'index',])->name('dominiosDaddy');
            Route::get('dominiosDaddy-create', [DominioDaddyController::class,'create',])->name('dominiosDaddy-create');
            Route::post('dominiosDaddy-store', [DominioDaddyController::class, 'store'])->name('admin-dominiosDaddy-store');
            Route::get('dominiosDaddy/{id}/editar', [DominioDaddyController::class,'update',])->name('admin-dominiosDaddy-editar');
            Route::put('dominiosDaddy/{id}', [DominioDaddyController::class,'edit',])->name('dominiosDaddy-actualizar');
            Route::delete('dominiosDaddy/{id}', [DominioDaddyController::class,'destroy',])->name('admin-dominiosDaddy-eliminar');

});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
