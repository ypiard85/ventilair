<?php

function showPromo($promos, $produitId)
{


    foreach($promos as $promo)
    {
       if($promo->date_debut <= date('Y-m-d')  && $promo->date_fin >=  date('Y-m-d')  ){
            foreach($promo->produits as $produit){
                    if($produit->id == $produitId ){
                         return $promo;
                    }
            }
       }
    }

}