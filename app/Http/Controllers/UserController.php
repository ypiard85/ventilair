<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Promo;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
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
        $user = User::find(auth()->user()->id);
        $user->load('adresses');
        $adresse = $user->adresses->where('defaut', 1)->first();
        return view('users.index', compact('user', 'adresse'));
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
    public function edit(User $user)
    {
        $user->load('adresses');
        return view('users.edit', compact('user'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:25'],
            'name' => ['required', 'string', 'max:25'],
            'pseudo' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:40'],
            'current_password' => ['required', new MatchOldPassword],
        ]);
        $user->prenom = $request->input('firstname');
        $user->nom = $request->input('name');
        $user->pseudo = $request->input('pseudo');

        if (!empty($request->input('new_password'))) {
            $request->validate([
                'new_password' => ['different:current_password', 'required', 'confirmed', 'string', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()],
            ]);
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();
        return back()->with('message', 'Félicitations, informations modifiées');
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

    public function deleteuser(User $user, Request $request){

        $user = User::find($request->user_id);

        $user->delete();


        return redirect('/');

    }
}
