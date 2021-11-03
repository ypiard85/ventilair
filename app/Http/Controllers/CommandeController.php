<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{

    
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id; 
        $commandes = Commande::where('user_id', $id)->get();
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'livraison' => "required|in:1,15,30",
            'adresselivraison' => "required|not_in:0",
            'adressefacturation' => "required|not_in:0",
         ]);
        $commande = new Commande();
        $commande->user_id = Auth::user()->id;
        $random = rand(1111111, 9999999);
        $commande->numero = $random;
        $commande->prix = session()->get('lastTotal');
        // $commande->adresse_livraison_id = $request->adresselivraison;
        // $commande->adresse_facturation_id = $request->adressefacturation;
        $commande->save();

        foreach(session("panier") as $produit) {
            $commande->produits()->attach($produit['id'], ['quantite' => $produit['quantite'], 'created_at' => now()]);
            $produitInDatabase = Produit::findOrFail($produit['id']);
            $produitInDatabase->stock -= $produit['quantite'];
            $produitInDatabase->save();
        }

        session()->forget("panier");
        return back()->with('message', 'Nouvelle commande enregistrée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $commande->load('produits');
        return view('commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
