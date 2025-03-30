<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EditorialController;
use App\Http\Controllers\TituloController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\RegaliaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\LibreriaController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DashboardController;

use Barryvdh\DomPDF\Facade as PDF;

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

Route::get('/', function () {
    return view('welcome');
});

/*
Route::resource('editoriales', EditorialController::class);
Route::resource('titulos', TituloController::class);
Route::resource('autores', AutorController::class);
Route::resource('regalias', RegaliaController::class);
Route::resource('ventas', VentaController::class);
Route::resource('librerias', LibreriaController::class);
Route::resource('descuentos', DescuentoController::class);
Route::resource('fotos', FotoController::class);
Route::resource('comentarios', ComentarioController::class);
Route::get('/algomal', [DashboardController::class, 'index'])->name('dashboard');









Route::get('editoriales_imprimir', [EditorialController::class, 'imprimir']);




Route::get('/regalias/{id}/edit', [RegaliaController::class, 'edit'])->name('regalias.edit');
Route::put('/regalias/{id}', [RegaliaController::class, 'update'])->name('regalias.update');
*/

// Grupo de rutas privadas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::resource('editoriales', EditorialController::class);
    Route::resource('titulos', TituloController::class);Route::resource('ventas', TituloController::class);
    Route::resource('autores', AutorController::class);
    Route::resource('regalias', RegaliaController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('librerias', LibreriaController::class);
    Route::resource('descuentos', DescuentoController::class);
    Route::resource('fotos', FotoController::class);
    Route::resource('comentarios', ComentarioController::class);
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('editoriales_imprimir', [EditorialController::class, 'imprimir']);

    Route::get('/regalias/{id}/edit', [RegaliaController::class, 'edit'])->name('regalias.edit');
    Route::put('/regalias/{id}', [RegaliaController::class, 'update'])->name('regalias.update');
    Route::get('/algomal', [DashboardController::class, 'index'])->name('dashboard');
});

// Redirigir después del login al dashboard
Route::redirect('/home', '/dashboard')->middleware('auth');
