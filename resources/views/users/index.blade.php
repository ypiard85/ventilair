@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card">
                <div class="card-header">{{ __('Bonjour') }} {{$user->prenom}} {{$user->nom}}</div>
                <div class="card-body">
                    <p>{{ __('Votre pseudo :') }} {{$user->pseudo}}</p>
                    <p>{{ __('Votre email :') }} {{$user->email}}</p>
                    <p>{{ __('Votre mot de passe : •••••••••••') }}</p>
                    @if($adresse)
                    <p>{{ __('Votre adresse :') }} {{$adresse->numero . ' ' . $adresse->rue . ' ' . $adresse->code_postal . ' ' . $adresse->ville}} </p>
                    @endif
                </div>

            </div>
            <a href="{{ route('user.edit', $user) }}" class="mt-3 btn btn-primary">
                {{ __('Modifier mes informations') }}
            </a>
            @if(Auth::user())
            <form class="mt-4 d-flex" action="{{ route('deleteuser', Auth::user() ) }}" method="post">
                @csrf
                <input name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}">
                <button class="btn btn-danger" onclick="return confirm('etes vous sûr de vouloir supprimer votre profil')" >Supprimer l'utilisateur</button>
            </form>
            @endif
        </div>
    </div>
    @endsection