@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Dashboard</h1>


    <table class="table">
        <h3>Produits</h3>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Categorie</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
          <tr>
            <th scope="row">{{ $produit->id }}</th>
            <td>{{ $produit->nom }}</td>
            <td>{{ $produit->categorie->nom }}</td>
            <td><a href="{{ route('produits.edit', $produit ) }}" class="me-2">Modifier</a>
                <form action="{{ route('produits.destroy', $produit ) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Voulez vous supprimer ce produit ? ')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>


</div>

@endsection
