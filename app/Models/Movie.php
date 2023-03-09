<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'director',
        'release_date',
        'genre',
        'poster',
        'rating',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
