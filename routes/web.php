<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsuariosController};
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Logs
    //    Route::group(['middleware' => 'role:administrador'], function () {
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    //    });

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Roles
    Route::group(['as' => 'roles.'], function () {
        Route::get('rol-permisos/{id}', [\App\Http\Controllers\RolesController::class, 'permisos'])->name('rol-permisos');
        Route::post('rol-permisos/{id}', [\App\Http\Controllers\RolesController::class, 'permisosUpdate'])->name('update-rol-permisos');
    });

    // Recursos
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('permisos', \App\Http\Controllers\PermisosController::class)->except('show');
    Route::resource('roles', \App\Http\Controllers\RolesController::class)->except('show');
    Route::resource('categorias', \App\Http\Controllers\CategoriaController::class)->parameters(['categorias' => 'categoria']);

    // Empresas
    Route::resource('empresas', \App\Http\Controllers\EmpresaController::class)->except('show');

});
