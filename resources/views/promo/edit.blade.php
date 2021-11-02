@extends('layouts.app')

@section('content')


<div class="container">
    <form action="{{ route('promo.update', $promo) }}" method="post" >
        @method('put')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label for="">Nom :</label>
                <input type="text" name="nom" value="{{ $promo->nom }}" class="form-control">
            </div>
            <div class="col-md-6 mt-2">
                <label for="">Date debut :</label>
                <input type="date" name="date_debut" value="{{ $promo->date_debut }}" class="form-control">
            </div>
            <div class="col-md-6 mt-2">
                <label for="">Date fin :</label>
                <input type="date" name="date_fin" value="{{ $promo->date_fin }}" class="form-control">
            </div>
            <div class="col-md-1 mt-2">
                <label for="">Reduction :</label>
                <input type="text" name="reduction" value="{{ $promo->reduction }}" class="form-control">
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
                      @foreach($produits as $key => $produit)
                        <tr>
                          <td>{{ $produit->nom }}</td>
                          <td>
<<<<<<< HEAD
                              <input type="checkbox" value="{{ $produit->id }}" name="produit-{{ $produit->id }}">
=======

                                <input type="checkbox" value="{{ $produit->id }}" name="produit-{{ $produit->id }}">

>>>>>>> yoann_final
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                <table>
                </div>
            </div>
            <button class="btn btn-success mt-3" type="submit">Enregistrer</button>
        </form>

</div>

@endsection