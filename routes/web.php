<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rutas públicas (sin login)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/quienes-somos', [PublicController::class, 'about'])->name('about');
Route::get('/contactanos', [PublicController::class, 'contact'])->name('contact');
Route::post('/contactanos', [PublicController::class, 'submitContact'])->name('contact.submit');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registro', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/registro', [AuthController::class, 'register'])->name('register');

/*
|--------------------------------------------------------------------------
| Rutas protegidas para ADMINISTRADOR (middleware: auth + rol administrador)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'rol'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Producción general
    Route::get('/produccion', [ProduccionController::class, 'index'])->name('admin.produccion.index');

    // Líneas de producción
    Route::get('/produccion/lineas', [ProduccionController::class, 'indexLineas'])->name('produccion.lineas.index');
    Route::get('/produccion/lineas/create', [ProduccionController::class, 'createLinea'])->name('produccion.lineas.create');
    Route::post('/produccion/lineas', [ProduccionController::class, 'storeLinea'])->name('produccion.lineas.store');
    Route::get('/produccion/lineas/{id}/edit', [ProduccionController::class, 'editLinea'])->name('produccion.lineas.edit');
    Route::put('/produccion/lineas/{id}', [ProduccionController::class, 'updateLinea'])->name('produccion.lineas.update');
    Route::delete('/produccion/lineas/{id}', [ProduccionController::class, 'destroyLinea'])->name('produccion.lineas.destroy');

    // Máquinas
    Route::get('/produccion/maquinas', [ProduccionController::class, 'indexMaquinas'])->name('produccion.maquinas.index');
    Route::get('/produccion/maquinas/create', [ProduccionController::class, 'createMaquina'])->name('produccion.maquinas.create');
    Route::post('/produccion/maquinas', [ProduccionController::class, 'storeMaquina'])->name('produccion.maquinas.store');
    Route::get('/produccion/maquinas/{id}/edit', [ProduccionController::class, 'editMaquina'])->name('produccion.maquinas.edit');
    Route::put('/produccion/maquinas/{id}', [ProduccionController::class, 'updateMaquina'])->name('produccion.maquinas.update');
    Route::delete('/produccion/maquinas/{id}', [ProduccionController::class, 'destroyMaquina'])->name('produccion.maquinas.destroy');

    // Sensores
    Route::get('/produccion/sensores', [ProduccionController::class, 'indexSensores'])->name('produccion.sensores.index');
    Route::get('/produccion/sensores/create', [ProduccionController::class, 'createSensor'])->name('produccion.sensores.create');
    Route::post('/produccion/sensores', [ProduccionController::class, 'storeSensor'])->name('produccion.sensores.store');
    Route::get('/produccion/sensores/{id}/edit', [ProduccionController::class, 'editSensor'])->name('produccion.sensores.edit');
    Route::put('/produccion/sensores/{id}', [ProduccionController::class, 'updateSensor'])->name('produccion.sensores.update');
    Route::delete('/produccion/sensores/{id}', [ProduccionController::class, 'destroySensor'])->name('produccion.sensores.destroy');

    // Mantenimiento
    Route::get('/mantenimiento', [MantenimientoController::class, 'indexAdmin'])->name('admin.mantenimiento');

    // Usuarios - Técnicos
    Route::get('/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios.index');
    Route::get('/usuarios/crear', [AdminController::class, 'formCrearTecnico'])->name('admin.usuarios.form');
    Route::post('/usuarios/asignar', [AdminController::class, 'asignarPermisos'])->name('admin.usuarios.create');
    Route::get('/usuarios/editar/{id}', [AdminController::class, 'formEditarTecnico'])->name('admin.usuarios.edit');
    Route::put('/usuarios/editar/{id}', [AdminController::class, 'editarTecnico'])->name('admin.usuarios.update');
    Route::delete('/usuarios/eliminar/{id}', [AdminController::class, 'eliminarTecnico'])->name('admin.usuarios.destroy');

    // Perfil
    Route::get('/perfil', [AdminController::class, 'perfil'])->name('admin.perfil');
    Route::post('/perfil/editar', [AdminController::class, 'editarPerfil'])->name('admin.perfil.editar');

    // Soporte
    Route::get('/soporte', [AdminController::class, 'soporte'])->name('admin.soporte');
    Route::post('/soporte', [AdminController::class, 'submitSoporte'])->name('admin.soporte.submit');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas para TÉCNICO (middleware: auth + rol técnico)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'rol:tecnico'])->prefix('tecnico')->group(function () {
    Route::get('/produccion', [TecnicoController::class, 'produccion'])->name('tecnico.produccion');
    Route::get('/mantenimiento', [MantenimientoController::class, 'indexTecnico'])->name('tecnico.mantenimiento');
    Route::post('/mantenimiento/{id}/resolver', [MantenimientoController::class, 'resolverFalla'])->name('tecnico.resolverFalla');

    // Perfil
    Route::get('/perfil', [TecnicoController::class, 'perfil'])->name('tecnico.perfil');
    Route::post('/perfil/editar', [TecnicoController::class, 'editarPerfil'])->name('tecnico.perfil.editar');

    // Contacto
    Route::get('/contacto', [TecnicoController::class, 'contacto'])->name('tecnico.contacto');
    Route::post('/contacto', [TecnicoController::class, 'submitContacto'])->name('tecnico.contacto.submit');
});

/*
|--------------------------------------------------------------------------
| Logout para cualquier usuario autenticado
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
