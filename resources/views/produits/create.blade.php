@extends('layouts.app')

@section('content')


<div class="container">
    <form action="{{ route('produits.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row">


            <div class="input-group hdtuto control-group lst increment" >
                <input type="file" name="filenames[]" class="myfrm form-control">
                <div class="input-group-btn">
                  <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                </div>
              </div>
              <div class="clone hide">
                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                  <input type="file" name="filenames[]" class="myfrm form-control">
                  <div class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                  </div>
                </div>
              </div>


            <label for="nom" class="col-md-11 mb-3">
                <span>Nom :</span>
                <input type="text"  name="nom" class="form-control">
            </label>
            <label for="stock" class="col-md-1 mb-3">
                <span>stock :</span>
                <input type="number" name="stock" class="form-control"></textarea>
            </label>
            <label for="description_courte" class="col-md-6 mb-3">
                <span>Description courte:</span>
                <textarea name="description_courte" rows="10" class="form-control"></textarea>
            </label>
            <label for="description" class="col-md-6 mb-3">
                <span>Description :</span>
                <textarea name="description" rows="10" class="form-control"></textarea>
            </label>
            <label for="prix" class="col-md-1">
                <span>Prix :</span>
                <input type="text" name="prix" class="form-control"  >
            </label>
            <label for="categorie" class="col-md-2">
                <span>Categorie :</span>
                <select name="categorie_id"  class="form-control">
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </label>
            <label for="couleur" class="col-md-2">
                <span>Couleur :</span>
                <input type="text" name="couleur" class="form-control"  >
            </label>
            <label for="note" class="col-md-1">
                <span>Note :</span>
            <input type="text" name="note"  class="form-control" >
        </label>
        <label for="type" class="col-md-1">
            <span>type :</span>
            <select name="type_id" class=" form-control" >
                @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->nom }}</option>
                @endforeach
            </select>
        </label>
        </div>
        <div class="row py-5">
            <label for="taille" class="col-md-2">
                <span>Taille (cm) :</span>
                <input type="number" min="1" name="taille"  class="form-control" >
            </label>
            <label for="Filtretailles_id" class="col-md-1">
                <span>Filtre Taille :</span>
                <select name="Filtretailles_id" class=" form-control" >
                    @foreach ($tailles as $taille)
                        <option value="{{ $taille->id }}">{{ $taille->intervalle }}</option>
                    @endforeach
                </select>
            </label>

            <label for="poids" class="col-md-1" >
                <span>Poids (kg) :</span>
                <input type="text" name="poids" class="form-control" >
            </label>

            <label for="filtre_poid" class="col-md-1" >
                <span>Filtre Poids :</span>
                <select name="filtrepoids_id" class=" form-control" >
                    @foreach ($poids as $poid)
                    <option value="{{ $poid->id }}">{{ $poid->intervalle }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <button class="btn btn-success">Modifier</button>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".hdtuto").remove();
      });
    });
</script>

@endsection