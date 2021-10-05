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
Route::get('populaires', [ProduitController::class, 'populaires'])->name('produits_populaires');


Route::resource('paniers', PanierController::class);

Route::post('viderpanier', [PanierController::class, 'empty'])->name('empty_panier');
Route::post('remove/{produit}' , [PanierController::class, 'remove'])->name('remove_panier');

Route::get('/', [HomeController::class, 'index' ] )->name('homepage');

Route::post('/deleteuser/{user}', [HomeController::class, 'deleteuser'] )->name('deleteuser');

// Concernant les commandes

Route::resource('/commande', App\Http\Controllers\CommandeController::class);

// Concernant le compte client
Route::resource('/user', App\Http\Controllers\UserController::class);

Route::resource('/adresse', App\Http\Controllers\AdresseController::class);
