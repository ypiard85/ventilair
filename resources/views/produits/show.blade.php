@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            @foreach($produit->images as $image )
            <img class="w-100" src="{{ asset("images/$image->name") }}" alt="image">
            @endforeach
        </div>
        <div class="col-md-7">
            <h3><span class="badge bg-secondary mt-2">{{ $produit->categorie->nom }}</span></h3>
            <h1>{{ $produit->nom }}</h1>
            @php $promo = showPromo($promos, $produit->id ); @endphp
            @if($promo)
            <p>
                <del>{{ $produit->prix }} €</del>
                <span class="fs-3" >{{ $produit->prix -  $produit->prix * ($produit->promos[0]->reduction / 100)  }} €</span>
                <h5><span class="badge bg-success mt-2">{{ $produit->promos[0]->nom }}</span></h5>
            </p>
            @else
                <h3>{{ $produit->prix }} €</h3>
            @endif
            <p class="mt-3">{{ $produit->description }}</p>
            <form action="{{ route('paniers.store', $produit ) }}" method="post">
                @csrf
                @if(Auth::user())
                <input type="hidden" value="{{ $produit->id }}" name="produit_id" >
                <input name="quantite" min="1" type="number" value="1" max="9" placeholder="Nombre ?" >
                <button class="btn btn-primary text-white">Ajouter au panier</button>
                @else
                <button disabled class="btn btn-primary text-white">Ajouter au panier</button>
                @endif
            </form>
        </div>
    </div>
</div>

@endsection