<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = []

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commandeArticle()
    {
        return $this->hasMany(CommandeArticle::class);
    }

}
