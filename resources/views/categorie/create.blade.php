@extends('layouts.app')

@section('content')


<div class="container">

    <form action="{{ route('categories.store') }}" method="post">
        @method('post')
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" name="nom">
            </div>
        </div>
        <button class="btn btn-success mt-3">Créer cette catégorie</button>
    </form>

</div>

@endsection