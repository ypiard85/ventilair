@extends('layouts.app')

@section('content')
<section class="mt-5 container">
    <h1>Vos commandes</h1>
    <table class="col-md-12 table table-hover">

        <thead>
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Date</th>
                <th scope="col">Montant</th>
                <th scope="col">Détails</th>
            </tr>
        </thead>
        @foreach($commandes as $commande)

        <tbody>
            <tr>
                <td>{{ $commande->numero }}</td>
                <td>{{ $commande->created_at }}</td>
                <td>{{ $commande->prix }}€</td>
                <td>
<a href="{{ route('commande.show', $commande ) }}" class="btn btn-warning">Détails</a>
                </td>
            </tr>
        </tbody>


        @endforeach
    </table>
</section>
@endsection