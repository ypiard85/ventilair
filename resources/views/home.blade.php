@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($promos as $promo )
        <p>{{ $promo->date_fin | diff }}</p>
    @endforeach
</div>

@endsection
