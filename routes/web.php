<?php

use App\Http\Controllers\GenerarOrdenesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('cursos',CursosController::class);
    Route::resource('users',UsersController::class);

    Route::get('/genera_ordenes',[GenerarOrdenesController::class,'index'])->name('genera_ordenes.index');  //
    Route::post('/generarOrdenes',[GenerarOrdenesController::class,'generarOrdenes'])->name('generaOrdenes');  //
    Route::get('/ver_ordenes/{especial}', [GenerarOrdenesController::class, 'verOrdenes'])->name('ver_ordenes');
    Route::post('/eliminar_orden',[GenerarOrdenesController::class,'eliminarOrden'])->name('eliminarOrden');
    Route::POST('/buscar', [OrdenesController::class, 'buscar'])->name('buscar');

    // Ruta para exportar las órdenes a un archivo Excel
    Route::get('/exportar_ordenes_excel', [GenerarOrdenesController::class, 'exportarExcel'])->name('exportar_ordenes_excel');
});

require __DIR__ . '/auth.php';
