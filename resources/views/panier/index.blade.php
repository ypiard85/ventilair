@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Panier</h3>

    @if(session()->has('panier') AND count(session("panier")) > 0 )
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix unitaire</th>
                <th scope="col">Quantite</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php 
            $lastTotal = null;
@endphp
            @foreach(session("panier") as $key => $produit)
            <tr>
                <th>{{ $produit['nom'] }}</th>
                @php $promo = showPromo($promos, $produit['id'] );
             $prixpromo = $produit['prix'] -  $produit['prix'] * ($promo->reduction / 100);  @endphp
                @if($promo)
                <th>{{ $prixpromo }}
                    €</th>
                @else
                <th>{{ $produit['prix'] }} €</th>
                @endif
                <th>
                    <form action="{{ route('paniers.store', $produit ) }}" method="post">
                        @csrf
                        <input type="number" value="{{ $produit['quantite'] }}" name="quantite" min="1" max="9">
                        <input type="hidden" value="{{ $key }}" name="produit_id">
                        <button class="outline-none border-0 bg-transparent"><i class="fas fa-check text-success"></i></button>
                    </form>
                </th>
                <th>@php 
                    $prixpromototalproduit = $prixpromo * $produit['quantite']; 
                    $lastTotal += $prixpromototalproduit;@endphp
                    {{$prixpromototalproduit}} €</th>
                <th>
                    <form action="{{ route('remove_panier', $key) }}" method="post">
                        @method('post')
                        @csrf
                        <button onclick="return confirm('voulez vous vraiment supprimer ce produit du panier ?')" class="outline-none border-0 bg-transparent"><i class="fas fa-window-close text-danger"></i></button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table mt-5">
        <tr>
            <td>Nombre de produit(s) différent(s)</td>
            <td>Total</td>
        </tr>
        <tr>
            <td>{{ count(session('panier')) }}</td>
            

                <td>{{$lastTotal}}
                    €</td>


        </tr>
    </table>
    </tbody>
    </table>
    @else
    <p>Votre panier est vide</p>
    @endif

    @if(session()->has('panier') && count(session('panier')) > 0)
    @php session()->put("lastTotal", $lastTotal); @endphp
    <a type="submit" class="btn btn-success" href="{{ route('validation_panier') }}">Valider le panier</a>
    @endif
</div>

@endsection