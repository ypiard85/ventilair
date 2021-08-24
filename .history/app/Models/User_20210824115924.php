<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Roles;
use App\Models\Adresse;
use App\Models\Favoris;
use App\Models\Commande;
use App\Models\Commandes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prenom',
        'nom',
        'pseudo',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function favoris()
    {
        return $this->belongsToMany(Favoris::class, '' );
    }

    public function note()
    {
        return $this->hasMany(User::class);
    }

    public function adresse()
    {
        return $this->hasMany(Adresse::class);
    }

}
