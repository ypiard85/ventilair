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
            @php $total = 0 @endphp
            @foreach(session("panier") as $key => $produit)
            @php $total += $produit['prix'] * $produit['quantite'] @endphp
            <tr>
                    <th>{{ $produit['nom'] }}</th>
                    <th>{{ $produit['prix'] }} €</th>
                    <th>
                        <form action="{{ route('paniers.store', $produit ) }}" method="post" >
                            @csrf
                            <input type="number" value="{{ $produit['quantite'] }}" name="quantite" min="1" max="9" >
                            <input type="hidden" value="{{ $key }}" name="produit_id" >
                            <button class="outline-none border-0 bg-transparent"><i class="fas fa-check text-success"></i></button>
                        </form>
                    </th>
                    <th>{{ $produit['prix'] * $produit['quantite'] }} €</th>
                    <th>
                        <form action="{{ route('remove_panier', $key) }}" method="post" >
                            @method('post')
                            @csrf
                            <button  onclick="return confirm('voulez vous vraiment supprimer ce produit du panier ?')" class="outline-none border-0 bg-transparent"><i class="fas fa-window-close text-danger"></i></button>
                        </form>
                    </th>
                </tr>
                @endforeach
        </tbody>
    </table>
                <table class="table mt-5">
                    <tr>
                        <td>Nombre de produits</td>
                        <td>Total</td>
                    </tr>
                    <tr>
                        <td>{{ count(session('panier')) }}</td>
                        <td>{{ $total }} €</td>
                    </tr>
                </table>
        </tbody>
      </table>
      @else
      <p>Votre panier est vide</p>
      @endif

      @if(session()->has('panier') && count(session('panier')) > 0)
      <button class="btn btn-success">Valider le panier</button>
      @endif
</div>

@endsection