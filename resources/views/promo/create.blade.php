@extends('layouts.app')

@section('content')


<div class="container">

    <form action="{{ route('promo.store') }}" method="post">
        @csrf
        @method('post')

        <div class="row">
            <div class="col-md-12">
                <label for="nom">Nom: </label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="col-md-6 mt-3">
                <label for="nom">Date début : </label>
                <input type="date" name="date_debut" class="form-control">
            </div>
            <div class="col-md-6 mt-3">
                <label for="nom">Date fin : </label>
                <input type="date" name="date_fin" class="form-control">
            </div>
            <div class="col-md-2 mt-3">
                <label for="nom">Réduction : (%) </label>
                <input type="text" name="reduction" class="form-control">
            </div>
        </div>
        <div class="accordion mt-5" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                  Produits
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Ajouter à cette promo</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($produits as $produit)
                            <tr>
                              <td>{{ $produit->nom }}</td>
                              <td>

                                <input type="checkbox" value="{{ $produit->id }}" name="produit-{{ $produit->id }}">

                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    <table>
                </div>
              </div>
        </div>
        <button class="btn btn-success mt-3">Créer une promo</button>
    </form>

</div>



@endsection