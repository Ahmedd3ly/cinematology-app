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
    /**
     * One to many relationship with Review class.
    *
     * i.e A movie can have many reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
