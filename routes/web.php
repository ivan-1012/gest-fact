<?php

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

Route::get('/', function () {
    return view('layout.plantilla');
});

Route::resource('clientes', 'App\Http\Controllers\CustomersController');
Route::resource('categorias', 'App\Http\Controllers\CategoryController');
Route::resource('productos', 'App\Http\Controllers\ProductController');