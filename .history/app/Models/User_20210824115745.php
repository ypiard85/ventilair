<?php

namespace App\Models;

use App\Models\Roles;
use App\Models\Adresse;
use App\Models\Favoris;
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
        'name',
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

    public function roles()
    {
        return $this->belongsTo(Roles::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commandes::class);
    }

    public function favoris()
    {
        return $this->hasMany(Favoris::class);
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
