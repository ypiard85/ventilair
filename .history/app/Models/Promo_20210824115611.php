<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'nom',
        'reduction'
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'promo_produits');
    }
}
