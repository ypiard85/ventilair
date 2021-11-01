Skip to content
Search or jump to…
Pull requests
Issues
Marketplace
Explore

@ypiard85
ypiard85
/
ventilair
Public
1
0
0
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
Settings
ventilair/resources/views/user/dashboard.blade.php
@ypiard85
ypiard85 ajout modif produit
Latest commit f1f5826 13 days ago
 History
 1 contributor
99 lines (87 sloc)  3.16 KB

@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Dashboard</h1>


    <table class="table">
        <h3>Produits</h3>
        <a href="{{ route('produits.create') }}" class="me-2 btn btn-success">Ajouter</a>
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
            <td>
              <a href="{{ route('produits.edit', $produit ) }}" class="me-2">Modifier</a>
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


      <table class="table">
        <h3>Catégories</h3>
        <a href="{{ route('categories.create') }}" class="me-2 btn btn-success">Ajouter</a>
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $categorie)
          <tr>
            <td>{{ $categorie->nom }}</td>
            <td>
              <a href="{{ route('categories.edit', $categorie ) }}" class="me-2">Modifier</a>
              <form action="{{ route('categories.destroy', $categorie ) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Voulez vous supprimer ce produit ? ')">Supprimer</button>
            </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      <table>

          <table class="table">
            <h3>Campagnes promotionnelles</h3>
            <a href="{{ route('campagnes.create') }}" class="me-2 btn btn-success">Ajouter</a>
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($campagnes as $campagne)
              <tr>
                <td>{{ $campagne->nom }}</td>
                <td>Du {{ $campagne->date_debut }} au {{ $campagne->date_fin }}</td>
                <td>
                  <a href="{{ route('campagnes.edit', $campagne ) }}" class="me-2">Modifier</a>
                  <form action="{{ route('campagnes.destroy', $campagne ) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" onclick="return confirm('Voulez vous supprimer ce produit ? ')">Supprimer</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            <table>



</div>

@endsection
