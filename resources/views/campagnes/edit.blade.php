@extends('layouts.app')

@section('content')


<div class="container">
    <form action="{{ route('campagnes.update', $campagne) }}" method="post" >
        @method('put')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label for="">Nom :</label>
                <input type="text" name="nom" value="{{ $campagne->nom }}" class="form-control">
            </div>
            <div class="col-md-6 mt-2">
                <label for="">Date debut :</label>
                <input type="date" name="date_debut" value="{{ $campagne->date_debut }}" class="form-control">
            </div>
            <div class="col-md-6 mt-2">
                <label for="">Date fin :</label>
                <input type="date" name="date_fin" value="{{ $campagne->date_fin }}" class="form-control">
            </div>
            <div class="col-md-1 mt-2">
                <label for="">Reduction :</label>
                <input type="text" name="reduction" value="{{ $campagne->reduction }}" class="form-control">
            </div>
        </div>
        <button class="btn btn-success mt-3" type="submit">Enregistrer</button>
    </form>
</div>

@endsection