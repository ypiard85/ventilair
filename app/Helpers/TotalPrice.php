<?php
/**
 * TotalPrice helper
 *
 *
 * @return $total
 */

function totalPrice()
{
    $total = 0;
    foreach (session("panier") as $key => $produit) {
        $total += $produit['prix'] * $produit['quantite'];
    };
    return $total;
}