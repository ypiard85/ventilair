@extends('layouts.app')

@section('content')

<main class="container mt-5 pt-5 row">

    <div class="row">
        <form action="" method="POST">

            <div class="basketamount__userinformations col-md-12 bg-warning pt-2 pb-2 me-2">
                <p class="basketamount__userinformationstitle basketpage__title border border-warning">Vos informations</p>
                <input type="text" class="input-text" name="street" placeholder="Nom de rue" minlength="2" maxlength="30" pattern="[A-Za-z -éàâêèç][^0-9]{2,30}" required>
                <input type="text" class="input-text" name="number" placeholder="Numéro de rue" minlength="1" maxlength="4" pattern="[0-9]{1,4}" required>
                <input type="text" class="input-text" name="zipcode" placeholder="Code postal" minlength="5" maxlength="5" pattern="[0-9]{5}" required>
                <input type="text" class="input-text" name="city" placeholder="Ville" minlength="2" maxlength="30" pattern="[A-Za-z -éàâêèç][^0-9]{2,30}" required>
            </div>

            <!-- Button trigger modal -->
            <div class="basketamount__total col text-center border border-success d-flex flex-column justify-content-center">
                <p class="basketamount__totalprice">Montant des frais de port : </p>
                <p class="basketamount__totalprice">Total de votre commande : </p>

                <button type="button" class="basketamount__totalsubmit btn btn-success col-md-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Je valide ma commande
                </button>
            </div>
        </form>

@endsection