<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;

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

Auth::routes();

Route::resource('produits', HomeController::class);

<<<<<<< HEAD
Route::get('/', [HomeController::class, 'index' ] )->name('homepage');
=======

// Concernant les commandes

Route::resource('/commande', App\Http\Controllers\CommandeController::class);
>>>>>>> d6da1da8d151315c3d0102de8706b783b2089b12
