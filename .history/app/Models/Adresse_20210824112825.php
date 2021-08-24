<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adresse extends Model
{
    use HasFactory;

    $fillable = [
        ''
    ]

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
