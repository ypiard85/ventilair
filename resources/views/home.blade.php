@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($categories as $categorie)
        {{ $categorie->produits[0]->categorie_id }}
    @endforeach

</div>

@endsection
