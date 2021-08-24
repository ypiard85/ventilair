<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Type;
use App\Models\User;
use App\Models\Favoris;
use App\Models\Commande;
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
        'taille',
        'poids',
        'type_id',
        'filtre_poids_id',
        'filtre_tailles_id',
    ];

    public function commande()
    {
        return $this->belongsToMany(Commande::class, 'commande_produits')->withPivot('quantite');
    }

    public function favoris()
    {
        return $this->belongsToMany(User::class, 'favoris');
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

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function promos()
    {
        return $this->belongsToMany(Promo::class, 'promo_produits' );
    }

}
