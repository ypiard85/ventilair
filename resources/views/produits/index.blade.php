@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <h1 align="center" class="mb-5">Liste des produits</h1>
        @foreach($produits as $produit)
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">
                   <p>{{ $produit->categorie->nom }}</p>
                    @foreach($produit->images as $image)
                    <img src="{{ asset("images/$image->name ") }}" class="w-100 shadow" alt="image">
                    @endforeach
                </div>
                <div class="card-body">

                    <h5 class="card-title">{{ $produit->nom }}</h5>
                    <p>
                        <span class="fs-3" >{{ $produit->prix }} €</span>
                    </p>
                    <p>{{ $produit->description_courte }}</p>
                    <p>{{ $produit->id }}</p>

                    <a href="{{ route('produits.show', ['produit' => $produit->id ] ) }}" class="btn btn-info text-white" >Voir le produit</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection