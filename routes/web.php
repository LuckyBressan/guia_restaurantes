<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\FuncionarioRestauranteController;
use App\Http\Controllers\CardapioRestauranteController;


use App\Http\Controllers\BaresController;
use App\Http\Controllers\FuncionarioBarController;
use App\Http\Controllers\CardapioBaresController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

/* RESTAURANTES */

Route::get('restaurantes/buscar',[RestauranteController::class,'buscar']);

Route::get('restaurantes/filtrar',[RestauranteController::class,'filtrar']);

Route::resource('restaurantes',RestauranteController::class);

Route::resource('funcionarios',FuncionarioRestauranteController::class);

Route::resource('cardapios',CardapioRestauranteController::class);

Route::resource('categorias',CategoriaController::class);

/* BARES */
Route::get('bares/buscar',[BaresController::class,'buscar']);

Route::get('bares/filtrar',[BaresController::class,'filtrar']);

Route::resource('bares',BaresController::class);

Route::resource('funcionariosBar',FuncionarioBarController::class);

Route::resource('cardapiosBar',CardapioBaresController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
