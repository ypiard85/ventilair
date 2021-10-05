<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Promo;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Filtrepoids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


         //afficher les produits par ordre croissant
        $produits = Produit::orderBy('nom', 'ASC')->get();

        $promos = Promo::all();

        $produits->load('images', 'categorie', 'promos');


        return view('produits.index', [
            'produits' => $produits,
            'promos' => $promos
        ]);

    }

    public function populaires()
    {
        $produits = Produit::orderBy('note', 'DESC')->limit(10)->get();



        return view('produits.populaire', [
            'produits' => $produits
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
                //récupération de la promo en cours
                $now = new Carbon();

                $produit->load('images');

                $promos = Promo::all();

        return view('produits.show',[
            'produit' => $produit,
            'promos' => $promos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $produit = Produit::find($id);
        $categories = Categorie::all();
        $poids = Filtrepoids::all();
        $types = Type::all();
        $produit->load('categorie');

        return view('produits.edit', [
            'produit' => $produit,
            'categories' => $categories,
            'poids' => $poids,
            'types' => $types
        ] );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {

            $request->validate([
                'nom' => 'required | string',
                'categorie_id' => 'required | string',
                'couleur' => 'required | string',
                'description' => 'required | string',
                'description_courte' => 'required | string',
                'prix' => 'required',
                'stock' => 'required | integer',
                'note' => 'required',
                'taille' => 'required | integer',
                'poids' => 'required',
                'type_id' => 'required | integer',
                'filtrepoids_id' => 'required',
                'filtre_tailles_id' => 'required',
            ]);



            $produit->update($request->all());


            return back()->with('message','Produit modifier avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $produit = Produit::find($id);

      $produit->delete();

      return redirect('/dashboard');

    }

}
