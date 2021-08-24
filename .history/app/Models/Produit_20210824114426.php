<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Favoris;
use App\Models\Categorie;
use App\Models\Filtre_poids;
use App\Models\Filtre_taille;
use App\Models\Commande_article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'description_courte',
        'categorie_id',
        'prix',
        'stock',
        'note',
        'couleur',
        'poids',
        'filtre_taille
    ];

    public function commandeArticle()
    {
        return $this->belongsTo(Commande_article::class);
    }

    public function favoris()
    {
        return $this->hasMany(Favoris::class);
    }

    public function filtrePoids()
    {
        return $this->belongsTo(Filtre_poids::class);
    }

    public function filtreTaille()
    {
        return $this->belongsTo(Filtre_taille::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

}
