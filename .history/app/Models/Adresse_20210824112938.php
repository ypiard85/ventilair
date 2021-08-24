<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adresse extends Model
{
    use HasFactory;

   protected $fillable = [
        'numero',
        'rue',
        'code_postal',
        'ville',
        'defaut'
   ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
