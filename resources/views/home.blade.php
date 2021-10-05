@extends('layouts.app')

@section('content')
<div class="container">
    @if($promos)
    <div class="promos">

        @if(Auth::user())
        <form action="{{ route('deleteuser', Auth::user() ) }}" method="post">
            @csrf
            <input name="user_id" type="text" value="{{ Auth::user()->id }}">
            <button onclick="return confirm('etes vous sûr de vouloir supprimer votre profil')" >Supprimer l'utilisateur</button>
        </form>
        @endif


        <h1 class="text-center">Les promos du moments</h1>
        <h4 class="text-center">Du
            {{ \Carbon\Carbon::parse($promos->date_debut)->format('j F Y') }}
            au
            {{ \Carbon\Carbon::parse($promos->date_fin)->format('j F Y') }}
        </h4>
        <div class="alert alert-success text-center py-5">
            <p class="fs-1">{{ $promos->nom }}</p>
        </div>
        <div class="row">
        @if($promos != null)
            @foreach($promos->produits as $produit)
                    @foreach($produit->images as $image)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <p class="p-2">{{ $produit->categorie->nom }}</p>
                            <img src="{{ asset("images/$image->name") }}" class="w-100 shadow" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produit->nom }}</h5>
                                    <p>
                                        <del>{{ $produit->prix }} €</del>

                                        <span class="fs-3" >{{ $produit->prix -  $produit->prix * ($promos->reduction / 100)  }} €</span>
                                    </p>

                                    <p class="card-text">{{ $produit->description_courte }}</p>
                                    <a href="{{ route('produits.show', ['produit' => $produit->id ] ) }}" class="btn btn-info text-white" >Voir le produit</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                @endif
            </div>
    </div>
    @endif
</div>

@endsection
