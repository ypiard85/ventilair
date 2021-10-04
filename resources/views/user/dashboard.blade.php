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
            <td><a href="" class="me-2">Modifier</a><a href="#">Supprimer</a></td>
        </tr>
        @endforeach
        </tbody>
      </table>


</div>

@endsection
