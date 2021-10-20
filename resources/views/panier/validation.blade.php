@extends('layouts.app')

@section('content')
@php $lastTotal = session()->get("lastTotal"); @endphp
<div class="container">

    <h3>Panier</h3>
    <div class="row">
        <h4>Contenu du panier</h4>
        <div class="col-md-12">
            @if(session()->has('panier') AND count(session("panier")) > 0 )
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Quantite</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session("panier") as $key => $produit)
                    @php $promo = showPromo($promos, $produit['id'] );
                    $prixpromo = $produit['prix'] - $produit['prix'] * ($promo->reduction / 100); @endphp

                    <tr>
                        <th>{{ $produit['nom'] }}</th>
                        @if($promo)
                        <th>{{ $prixpromo }}
                            €</th>
                        @else
                        <th>{{ $produit['prix'] }} €</th>
                        @endif
                        <th>{{ $produit['quantite'] }}</th>
                        <th>@php
                            $prixpromototalproduit = $prixpromo * $produit['quantite']; @endphp
                            {{$prixpromototalproduit}} €
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table mt-5">
                <tr>
                    <td>Nombre de produit(s) différent(s)</td>
                    @php totalPrice() @endphp
                    <td>Total</td>
                </tr>
                <tr>
                    <td>{{ count(session('panier')) }}</td>
                    <td>{{$lastTotal}}€</td>
                </tr>

            </table>
            </tbody>
            </table>
            @else
            <p>Votre panier est vide</p>
            @endif
        </div>



        <div class="col-md-12 mt-5">
            <div class="row mb-5">

                <h4>Mes adresses</h4>
                @if (count($user[0]->adresses) > 0)
                @foreach($user[0]->adresses as $adresse)
                <div class="col-md-6">
                    <div class="card-header">
                        <h5>{{ __('Adresse postale n°') }}
                            {{ $loop->iteration }}
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('adresse.update', $adresse) }}">

                        @csrf
                        @method ('PUT')


                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de rue') }}</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('name') is-invalid @enderror" name="numero" value="{{ $adresse->numero }}" required autofocus>

                                @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rue" class="col-md-4 col-form-label text-md-right">{{ __('Nom de rue') }}</label>

                            <div class="col-md-6">
                                <input id="rue" type="text" class="form-control @error('name') is-invalid @enderror" name="rue" autocomplete="street-address" value="{{ $adresse->rue }}" required autofocus>

                                @error('rue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code_postal" class="col-md-4 col-form-label text-md-right">{{ __('Code postal') }}</label>

                            <div class="col-md-6">
                                <input id="code_postal" type="text" class="form-control @error('name') is-invalid @enderror" name="code_postal" autocomplete="postal-code" value="{{ $adresse->code_postal }}" required autofocus>

                                @error('code_postal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                            <div class="col-md-6">
                                <input id="ville" type="text" class="form-control @error('name') is-invalid @enderror" name="ville" autocomplete="address-level2" value="{{ $adresse->ville }}" required autofocus>

                                @error('ville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="m-1 btn btn-success">
                                    {{ __('Enregistrer cette adresse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
                @endif
                <form class="row" method="POST" action="{{ route('commande.store') }}">
                    @csrf
                    <div class="col-md-6 mt-5 mb-5">
                        <div class="card-header">
                            <h5>{{ __('Adresse de facturation') }}
                            </h5>
                        </div>
                        <div>
                            <select name="adressefacturation" class="form-select" aria-label="Default select example">
                                <option value="0" selected>Sélectionnez votre adresse de facturation</option>
                                @foreach($user[0]->adresses as $adresse)
                                <option value="{{$adresse->id}}">{{$adresse->numero . ' ' . $adresse->rue . ' ' . $adresse->code_postal . ' ' . $adresse->ville}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mt-5 mb-5">
                        <div class="card-header">
                            <h5>{{ __('Adresse de livraison') }}
                            </h5>
                        </div>
                        <div>
                            <select name="adresselivraison" class="form-select" aria-label="Default select example">
                                <option value="0" selected>Sélectionnez votre adresse de livraison</option>
                                @foreach($user[0]->adresses as $adresse)
                                <option value="{{$adresse->id}}">{{$adresse->numero . ' ' . $adresse->rue . ' ' . $adresse->code_postal . ' ' . $adresse->ville}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h4>Mode d'expédition</h4>
                    <div class="col-md-6 mt-5 mb-5">
                        <div>
                            <select name="livraison" id="livraison" class="form-select" aria-label="Default select example" onchange="valueTest()">
                                <option value="0" selected>Sélectionnez votre mode de livraison</option>
                                @if($lastTotal > 1200)

                                <option value="1">Livraison offerte (+0€)</option>


                                @else

                                <option value="15">Livraison en 7 jours ouvrés (+15€)</option>@endif

                                <option value="30">Livraison en 2 jours ouvrés (+30€)</option>
                            </select>
                        </div>
                    </div>




                    <!-- Button trigger modal -->
                    <div class="basketamount__total col text-center border border-success d-flex flex-column justify-content-center">
                        <p id="basketamount_totalprice" class="basketamount__totalprice">Total de votre commande : {{ $lastTotal }}€</p>
                        <input name="totalAmount" id="totalamount" type="hidden" value="{{ $lastTotal }}">


                        <button type="submit" class="basketamount__totalsubmit btn btn-success col-md-12">
                            Je valide ma commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function valueTest() {
            let livraison = document.getElementById("livraison");
            let valeurLivraison = livraison.value;
            if (valeurLivraison == 1) {
                valeurLivraison = 0;
            }
            let valeurTotal = <?php echo $lastTotal; ?>;
            let totalActuel = document.getElementById("totalamount").value;
            totala = parseFloat(valeurLivraison) + parseFloat(valeurTotal);
            document.getElementById("totalamount").value = totala;
            document.getElementById("basketamount_totalprice").innerHTML = 'Total de votre commande : ' + totala + '€';
        }
    </script>
    @endsection