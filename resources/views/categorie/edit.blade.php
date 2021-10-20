@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('categories.update', $category ) }}" method="post">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-6">
                <label for="nom">Name</label>
                <input class="form-control" type="text" value="{{ $category->nom }}" name="nom">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
</div>

@endsection