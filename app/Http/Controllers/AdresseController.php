<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Adresse;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        
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
            'numero' => ['required', 'numeric', 'max:3'],
            'rue' => ['required', 'string', 'max:40'],
            'code_postal' => ['required', 'string', 'max:5'],
            'ville' => ['required', 'string', 'max:40'],
        ]);

        $adresse = new Adresse();
        $adresse->numero = $request->input('numero');
        $adresse->rue = $request->input('rue');
        $adresse->code_postal = $request->input('code_postal');
        $adresse->ville = $request->input('ville');
        $adresse->defaut = 1;
        $adresse->user_id = Auth::user()->id;
        $adresse->save();

        return back()->with('message', 'Nouvelle adresse enregistrée avec succès');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adresse $adresse)
    {
        $request->validate([
            'numero' => ['required', 'numeric', 'max:3'],
            'rue' => ['required', 'string', 'max:40'],
            'code_postal' => ['required', 'numeric', 'max:5'],
            'ville' => ['required', 'string', 'max:40'],
        ]);

        $adresse->numero = $request->input('numero');
        $adresse->rue = $request->input('rue');
        $adresse->code_postal = $request->input('code_postal');
        $adresse->ville = $request->input('ville');
        $adresse->save();

        return back()->with('message', 'Nouvelle adresse enregistrée avec succès');
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
