<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Adresse;
use App\Models\User;

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
            'numero' => 'string|max:3',
            'rue' => 'required|string|max:40',
            'code_postal' => 'required|string|max:5',
            'ville' => 'required|string|max:40',
        ]);

        $adresse = new Adresse();
        if ($request->input('numero')) {
            $adresse->numero = $request->input('numero');
        }
        $adresse->rue = $request->input('rue');
        $adresse->code_postal = $request->input('code_postal');
        $adresse->ville = $request->input('ville');
        $adresse->user_id = Auth::user()->id;
        $useradresse = Adresse::where('user_id', Auth::user()->id)->get();
        $numberadresse = count($useradresse);
        if ($numberadresse === 0) {
            $adresse->defaut = 1;
        } else {
            $adresse->defaut = 0;
        }
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
            'numero' => 'string|max:3',
            'rue' => 'required|string|max:40',
            'code_postal' => 'required|string|max:5',
            'ville' => 'required|string|max:40',
        ]);

        $adresse->numero = $request->input('numero');
        $adresse->rue = $request->input('rue');
        $adresse->code_postal = $request->input('code_postal');
        $adresse->ville = $request->input('ville');


        if ($request->input('defaut')) {
            $id = Auth::user()->id;
            $user = User::where('id', $id)->get();
            $user->load('adresses');
            $adressetoreset = $user->first()->adresses->where('defaut', 1);
            $adressetoreset = $adressetoreset->first();
            $adressetoreset->defaut = 0;
            $adressetoreset->save();
            $adresse->defaut = 1;
        }

        $adresse->save();


        return back()->with('message', 'Nouvelle adresse enregistrée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adresse $adresse)
    {
        $adresse->delete();
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();
        $user->load('adresses');
        $adressetoreset = $user->first()->adresses->where('defaut', 0);
        $adressetoreset = $adressetoreset->first();
        $adressetoreset->defaut = 1;
        $adressetoreset->save();
        return back()
            ->with('message', 'Félicitations, votre adresse est supprimée');
    }
}
