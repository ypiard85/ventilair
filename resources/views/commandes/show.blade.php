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
                <h2>Commande n°{{ $commande->numero}} pour un montant de {{ $commande->prix}}€ TTC</h2>

                    <tbody>
                    @foreach($commande->produits as $produit)
                        <tr>
                            <td>{{ ($produit->nom) }}</td>
                            <td>{{ ($produit->prix) }}</td>
                            <td>{{ $produit->pivot->quantite }}</td>
                            <td>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    
                    
            </table>
        </section>
@endsection

