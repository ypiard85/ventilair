<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Promo;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //récupérer les produits avec ses catégories
        $categories = Categorie::all();
        $categories->load('produits.images');

        //récupération de la promo en cours
        $now = new Carbon();
        $promos = Promo::with(['produits' => function($query){
            $query->limit(3);
        }])
            ->where('date_debut', '<=', $now->now())
            ->where('date_fin', '>=', $now->now())->get()
            ;

        $promos = $promos[0];

        return view('home', [
            'categories' => $categories,
            'promos' => $promos,

        ]);

    }
}
