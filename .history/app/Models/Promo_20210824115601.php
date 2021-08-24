<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Promo_article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        ''
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'promo_produits');
    }
}