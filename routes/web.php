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
use App\Models\Admin\Usuario;

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
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Categorias
        Route::get('categorias', [CategoriaController::class,'index',])->name('admin-categorias');
        Route::get('categorias-crear', [CategoriaController::class,'crear',])->name('admin-categorias-crear');
        Route::post('categorias', [CategoriaController::class, 'guardar'])->name('admin-categorias-guardar');
        Route::get('categorias/{id}/editar', [CategoriaController::class,'editar',])->name('admin-categorias-editar');
        Route::put('categorias/{id}', [CategoriaController::class,'actualizar',])->name('admin-categorias-actualizar');
        Route::delete('categorias/{id}', [CategoriaController::class,'eliminar',])->name('admin-categorias-eliminar');
        // ------------------------------------------------------------------------------------
    });
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
