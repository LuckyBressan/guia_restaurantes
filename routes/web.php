<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FuncionarioRestauranteController;
use App\Http\Controllers\CardapioRestauranteController;

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

Route::resource('restaurantes',RestauranteController::class);

Route::resource('funcionarios',FuncionarioRestauranteController::class);

Route::resource('cardapios',CardapioRestauranteController::class);

Route::resource('categorias',CategoriaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
