@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 align="center">Les plus populaires</h1>
        <div class="mt-5 row justify-content-center">
            @foreach($produits as $produit)
                <div class="col-md-2 mb-3">
                    <div class="card">
                        <div class="card-body">
                            @foreach($produit->images as $image)
                            <img class="w-100" src="{{ asset("images/$image->name ") }}" alt="{{ $produit->nom }}">
                            @endforeach
                            <h3>{{ $produit->nom }}</h3>
                            <h6 class="fw-bold"><i class="fas fa-star text-warning"></i> {{ $produit->note }}/10</h6>
                            <p>{{ $produit->description_courte }}</p>
                            @if(isset($produit->promos[0]))
                                <p>
                                    <del>{{ $produit->prix }} €</del>
                                    <span class="fs-3" >{{ $produit->prix -  $produit->prix * ($produit->promos[0]->reduction / 100)  }} €</span>
                                </p>
                                @else
                                    <h3>{{ $produit->prix }} €</h3>
                                @endif
                                <a href="{{ route('produits.show', ['produit' => $produit->id ] ) }}" class="btn btn-info text-white" >Voir le produit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection