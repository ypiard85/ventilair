<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promo::all();

        $promos->load('produits.images');

        return view('promo.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::all();

        return view('promo.create', compact('produits'));

    }

    /**
     * Store a newly cre²ated resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produits = Produit::all();

        $data = $request->validate([
            'nom' => 'required | string',
            'date_debut' => 'required | date',
            'date_fin' => 'required | date',
            'reduction' => 'required | int'
        ]);

        $promo = Promo::create($data);

        foreach($produits as $key => $produit){
            if($request->input('produit-'.$key)){
                $promo->produits()->attach($produit->id);
            }
        }

        return redirect('/dashboard');

        //attach->
        //dettach->

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        $produits = Produit::all();

        return view('promo.edit', compact('promo', 'produits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'nom' => 'string',
            'date_debut' => 'date',
            'date_fin' => 'date',
            'reduction' => 'int'
        ]);

        $produits = Produit::all();

        foreach($promo->produits as $produit){
            $promo->produits()->detach($produit->id);
        }

        foreach($produits as $key => $produit){
            if($request->input('produit-'.$key)){
                $promo->produits()->attach($produit->id);
            }
        }

        $promo->update($request->all());

        return back()->with('message', 'Promo modifier avec succè');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $promo = Promo::find($id);

        $promo->delete();

        return redirect('/dashboard');
    }
}
