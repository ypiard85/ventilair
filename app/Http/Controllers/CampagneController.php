<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Promo;
use Illuminate\Http\Request;

class CampagneController extends Controller
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

        return view('campagnes.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::all();

        return view('campagnes.create', compact('produits'));

    }

    /**
     * Store a newly cre²ated resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       $data = $request->validate([
            'nom' => 'required | string',
            'date_debut' => 'required | date',
            'date_fin' => 'required | date',
            'reduction' => 'required | int'
        ]);

        $produit = Produit::all();


        dd($request->get('product_id'));

        $campagne = Promo::create($data);

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
    public function edit($id)
    {
        $campagne = Promo::find($id);

        return view('campagnes.edit', compact('campagne'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $campagne)
    {
        $request->validate([
            'nom' => 'string',
            'date_debut' => 'date',
            'date_fin' => 'date',
            'reduction' => 'int'
        ]);

        $campagne->update($request->all());

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
