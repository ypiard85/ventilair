<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Type;
use App\Models\User;
use App\Models\Image;
use App\Models\Favoris;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\Filtrepoids;
use App\Models\Filtretaille;
use App\Models\Commande_article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $with = ['images'];

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
        'Filtrepoids_id',
        'Filtretailles_id',
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produits')->withPivot('quantite');
    }

    public function favoris()
    {
        return $this->belongsToMany(User::class, 'favoris');
    }

    public function filtrePoids()
    {
        return $this->belongsTo(Filtrepoids::class);
    }

    public function filtreTaille()
    {
        return $this->belongsTo(Filtretaille::class);
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

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
