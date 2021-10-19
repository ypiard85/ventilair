<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

    }


    public function dashboard()
    {

        $produits = Produit::all();

        $produits->load('categorie');

        $categories = Categorie::all();

        $campagnes = Promo::all();

        return view('user.dashboard', [
            'produits' => $produits,
            'categories' => $categories,
            'campagnes' => $campagnes
        ]);
    }
}
