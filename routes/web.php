<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProduccionController;

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
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

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
    
    //mantenimiento
    Route::get('/mantenimiento', [AdminController::class, 'mantenimiento'])->name('admin.mantenimiento');
    Route::post('/mantenimiento/resolver/{id}', [AdminController::class, 'resolverFalla'])->name('admin.resolver.falla');
    Route::get('/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::post('/usuarios/asignar', [AdminController::class, 'asignarPermisos'])->name('admin.usuarios.asignar');
    Route::put('/usuarios/editar/{id}', [AdminController::class, 'editarTecnico'])->name('admin.usuarios.editar');
    Route::delete('/usuarios/eliminar/{id}', [AdminController::class, 'eliminarTecnico'])->name('admin.usuarios.eliminar');
    Route::get('/perfil', [AdminController::class, 'perfil'])->name('admin.perfil');
    Route::post('/perfil/editar', [AdminController::class, 'editarPerfil'])->name('admin.perfil.editar');
    Route::get('/soporte', [AdminController::class, 'soporte'])->name('admin.soporte');
    Route::post('/soporte', [AdminController::class, 'soporteSubmit'])->name('admin.soporte.submit');
});


/*
|--------------------------------------------------------------------------
| Rutas protegidas para TÉCNICO (middleware: auth + rol técnico)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'rol:tecnico'])->prefix('tecnico')->group(function () {
    Route::get('/produccion', [TecnicoController::class, 'produccion'])->name('tecnico.produccion');
    Route::get('/mantenimiento', [TecnicoController::class, 'mantenimiento'])->name('tecnico.mantenimiento');
    Route::post('/mantenimiento/resolver/{id}', [TecnicoController::class, 'resolverFalla'])->name('tecnico.resolver.falla');
    Route::get('/perfil', [TecnicoController::class, 'perfil'])->name('tecnico.perfil');
    Route::post('/perfil/editar', [TecnicoController::class, 'editarPerfil'])->name('tecnico.perfil.editar');
    Route::get('/contacto', [TecnicoController::class, 'contacto'])->name('tecnico.contacto'); // opcional
});

/*
|--------------------------------------------------------------------------
| Logout para cualquier usuario autenticado
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
