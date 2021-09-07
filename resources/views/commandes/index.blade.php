@extends('layouts.app')

@section('content')
<section class="mt-5 container">
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
                                <form action="commande.php" method="POST">
                                    <input name="number" type="hidden" value="numero">
                                    <input name="id" type="hidden" value="id">
                                    <input class="btn btn-warning" type="submit" value="Détails">
                                </form>
                            </td>

                        </tr>
                    </tbody>


                    @endforeach
            </table>
        </section>
@endsection

