<?php

namespace App\Models;


use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande_article extends Model
{
    use HasFactory;

    protected $fillable = [
        ''
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
