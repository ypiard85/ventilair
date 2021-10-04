<?php

namespace App\Http\Controllers;

use App\Models\Produit;
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

        return view('user.dashboard', [
            'produits' => $produits
        ]);
    }
}
