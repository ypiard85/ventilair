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
                        <img src="{{ asset("images/$image->name") }} " class="w-100 shadow" alt="image">
                    @endforeach
                </div>
                <div class="card-body">

                    <h5 class="card-title">{{ $produit->nom }}</h5>

                    @php $promo = showPromo($promos, $produit->id ); @endphp
                    @if($promo)
                    <p>
                        <del>{{ $produit->prix }} €</del>
                        <span class="fs-3" >{{ $produit->prix -  $produit->prix * ($produit->promos[0]->reduction / 100)  }} €</span>
                    </p>
                    <h5><span class="badge bg-success">{{ $produit->promos[0]->nom }}</span></h5>
                    @else
                        <h3>{{ $produit->prix }} €</h3>
                    @endif
                    <p>{{ $produit->description_courte }}</p>


                    <a href="{{ route('produits.show', ['produit' => $produit->id ] ) }}" class="btn btn-info text-white" >Voir le produit</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection