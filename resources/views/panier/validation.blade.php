@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Panier</h3>
    <div class="row">
        <div class="col-md-6">
            @if(session()->has('panier') AND count(session("panier")) > 0 )
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Quantite</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach(session("panier") as $key => $produit)
                    @php $total += $produit['prix'] * $produit['quantite'] @endphp
                    <tr>
                        <th>{{ $produit['nom'] }}</th>
                        <th>{{ $produit['prix'] }} €</th>
                        <th>{{ $produit['quantite'] }}</th>
                        <th>{{ $produit['prix'] * $produit['quantite'] }} €</th>
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
                </tr>
            </table>
            </tbody>
            </table>
            @else
            <p>Votre panier est vide</p>
            @endif
        </div>



        <div class="col-md-6">
            <form action="" method="POST">

                <div class="basketamount__userinformations col-md-12 bg-warning pt-2 pb-2 me-2">
                    <p class="basketamount__userinformationstitle basketpage__title border border-warning">Vos informations</p>
                    <input type="text" class="input-text" name="street" placeholder="Nom de rue" minlength="2" maxlength="30" pattern="[A-Za-z -éàâêèç][^0-9]{2,30}" required>
                    <input type="text" class="input-text" name="number" placeholder="Numéro de rue" minlength="1" maxlength="4" pattern="[0-9]{1,4}" required>
                    <input type="text" class="input-text" name="zipcode" placeholder="Code postal" minlength="5" maxlength="5" pattern="[0-9]{5}" required>
                    <input type="text" class="input-text" name="city" placeholder="Ville" minlength="2" maxlength="30" pattern="[A-Za-z -éàâêèç][^0-9]{2,30}" required>
                </div>

                <!-- Button trigger modal -->
                <div class="basketamount__total col text-center border border-success d-flex flex-column justify-content-center">
                    @php totalPrice() @endphp
                    <p class="basketamount__totalprice">Montant des frais de port : @if($total > 6600) 
                    @php 
                    $freedelivery = true;
                    $deliveryprice = 0; 
                    @endphp
                    {{'Gratuit'}}
                    
                    @else 
                    @php 
                    $freedelivery = false;
                    $deliveryprice = 59;
                    $total += $deliveryprice; 
                    @endphp 
                    {{$deliveryprice}}{{'€'}}@endif </p>
                    <p class="basketamount__totalprice">Total de votre commande : {{ $total }}€</p>

                    <button type="button" class="basketamount__totalsubmit btn btn-success col-md-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Je valide ma commande
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection