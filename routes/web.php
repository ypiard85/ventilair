<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
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


Auth::routes();

Route::resource('produits', ProduitController::class);
Route::resource('paniers', PanierController::class);

Route::post('viderpanier', [PanierController::class, 'empty'])->name('empty_panier');
Route::post('remove/{produit}' , [PanierController::class, 'remove'])->name('remove_panier');

Route::get('/', [HomeController::class, 'index' ] )->name('homepage');



// Concernant les commandes

Route::resource('/commande', App\Http\Controllers\CommandeController::class);
