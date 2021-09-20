@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($produit->images as $image )
    <div class="row">
        <div class="col-md-5">
            <img class="w-100" src="{{ asset("images/$image->name") }}" alt="image">
        </div>
        <div class="col-md-7">
            <h1>{{ $produit->nom }}</h1>
            @if(isset($produit->promos[0]))
            <p>
                <del>{{ $produit->prix }} €</del>
                <span class="fs-3" >{{ $produit->prix -  $produit->prix * ($produit->promos[0]->reduction / 100)  }} €</span>
            </p>
            @else
                <h3>{{ $produit->prix }} €</h3>
            @endif
            <p class="mt-3">{{ $produit->description }}</p>
            <form action="{{ route('paniers.create') }}" method="get">
                @csrf
                <input type="text" name="produit" value="{{ $produit->id }}" >

                <button class="btn btn-primary text-white">Ajouter au panier</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection