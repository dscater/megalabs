<?php

use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaestroRegistroController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SeguimientoAprobadoController;
use App\Http\Controllers\SeguimientoRectificacionController;
use App\Http\Controllers\SeguimientoTramiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// LOGIN
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


// CONFIGURACIÓN
Route::get('/configuracion/getConfiguracion', [ConfiguracionController::class, 'getConfiguracion']);
Route::post('/configuracion/update', [ConfiguracionController::class, 'update']);


Route::prefix('admin')->group(function () {
    // USUARIOS
    Route::get('usuarios/getUsuario/{usuario}', [UserController::class, 'getUsuario']);
    Route::get('usuarios/userActual', [UserController::class, 'userActual']);
    Route::get('usuarios/getInfoBox', [UserController::class, 'getInfoBox']);
    Route::get('usuarios/getPermisos/{usuario}', [UserController::class, 'getPermisos']);
    Route::get('usuarios/getEncargadosRepresentantes', [UserController::class, 'getEncargadosRepresentantes']);
    Route::post('usuarios/actualizaContrasenia/{usuario}', [UserController::class, 'actualizaContrasenia']);
    Route::post('usuarios/actualizaFoto/{usuario}', [UserController::class, 'actualizaFoto']);
    Route::resource('usuarios', UserController::class)->only([
        'index', 'store', 'update', 'destroy', 'show'
    ]);

    // MAESTRO DE REGISTRO
    Route::resource('maestro_registros', MaestroRegistroController::class)->only([
        'index', 'store', 'update', 'destroy', 'show'
    ]);

    // SEGUIMIENTO TRAMITES
    Route::resource('seguimiento_tramites', SeguimientoTramiteController::class)->only([
        'index', 'store', 'update', 'destroy', 'show'
    ]);

    // SEGUIMIENTO TRAMITES APROBADOS
    Route::resource('seguimiento_aprobados', SeguimientoAprobadoController::class)->only([
        'index', 'store', 'update', 'destroy', 'show'
    ]);

    // SEGUIMIENTO TRAMITES RECTIFICACIONES
    Route::resource('seguimiento_rectificacions', SeguimientoRectificacionController::class)->only([
        'index', 'store', 'update', 'destroy', 'show'
    ]);

    // NOTAS
    Route::resource('notas', NotaController::class)->only([
        'index', 'store', 'update', 'destroy', 'show'
    ]);

    // REPORTES
    Route::post('reportes/usuarios', [ReporteController::class, 'usuarios']);
});

// ---------------------------------------
Route::get('/{optional?}', function () {
    return view('app');
})->name('base_path')->where('optional', '.*');
