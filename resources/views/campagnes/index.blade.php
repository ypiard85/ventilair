@extends('layouts.app')

@section('content')


<div class="container">
    @if($promos != null)
    @foreach($promos as $promo)
    <div class="row">
            <div class="bg-success py-5 text-center">
                <h3>{{ $promo->nom }}</h3>
            </div>
            <h4 class="text-center my-3">Du
                {{ \Carbon\Carbon::parse($promo->date_debut)->format('j F Y') }}
                au
                {{ \Carbon\Carbon::parse($promo->date_fin)->format('j F Y') }}
            </h4>
            @foreach($promo->produits as $produit)

            <div class="col-md-4 mb-3">
                <div class="card">
                    <p class="p-2">{{ $produit->categorie->nom }}</p>
                    @foreach($produit->images as $image)
                    <img src="{{ asset("images/$image->name") }}" class="w-100 shadow" alt="">
                    @endforeach
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->nom }}</h5>
                        <p>
                            <del>{{ $produit->prix }} €</del>

                            <span class="fs-3" >{{ $produit->prix -  $produit->prix * ($promo->reduction / 100)  }} €</span>
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

@endsection