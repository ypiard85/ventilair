<?php

namespace App\Models;

use App\Models\Promo;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo_article extends Model
{
    use HasFactory;

    public function produit()
    {
        return $this->hasMany(Produit::class);
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

}
