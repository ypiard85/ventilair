<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Adresse;
use App\Models\Promo;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promo::all();
        return view('panier.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Produit $produit, Request $request)
    {
    }

    public function validation(Request $request)
    {
        $promos = Promo::all();
        $panier = session()->get('panier');
        $lastTotal = $request->input('lastTotal');
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();
        $user->load('adresses');
        return view('panier.validation', compact('panier', 'user', 'lastTotal', 'promos'));
    }

    public function postvalidation(Request $request, Adresse $adresse) {
        
    }


    public function remove(Produit $produit)
    {
        $panier = session()->get("panier"); // On récupère le panier en session
        unset($panier[$produit->id]); // On supprime le produit du tableau $basket
        session()->put("panier", $panier);

        return redirect('/paniers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $panier = session()->get('panier');

        $produit = Produit::find($request->produit_id);

        $produit_detail = [
            'id' => $produit->id,
            'description' => $produit->description_courte,
            'nom' => $produit->nom,
            'image' => $produit->images,
            'prix' => $produit->prix,
            'quantite' => $request->quantite,
        ];


        $panier[$produit->id] = $produit_detail;
        session()->put("panier", $panier);

        return redirect('/paniers');
    }

    public function empty()
    {
        session()->forget("panier");


        return redirect('/');
    }
}
