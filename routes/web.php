<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EditorialController;
use App\Http\Controllers\TituloController;
use App\Http\Controllers\AutorController;

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

Route::resource('editoriales', EditorialController::class);
Route::resource('titulos', TituloController::class);
Route::resource('autores', AutorController::class);


Route::get('editoriales_imprimir', [EditorialController::class, 'imprimir']);
