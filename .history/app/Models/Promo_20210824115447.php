<?php

namespace App\Models;

use App\Models\Promo_article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    public function promoProduits()
    {
        return $this->hasMany(Promo_article::class);
    }
}
