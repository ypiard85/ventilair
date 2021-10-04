@extends('layouts.app')

@section('content')
<section class="mt-5 container">
            <table class="col-md-12 table table-hover">

                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                @foreach($commandesdetails as $commandes)
                <h2>Commande n°{{ $commandes->numero}} pour un montant de {{ $commandes->prix}}€ TTC</h2>

                    <tbody>
                    @foreach($commandes->produits as $produit)
                        <tr>
                            <td>{{ ($produit->nom) }}</td>
                            <td>{{ ($produit->prix) }}</td>
                            <td>{{ $produit->pivot->quantite }}</td>
                            <td>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    

                    @endforeach
                    
                    
            </table>
        </section>
@endsection

