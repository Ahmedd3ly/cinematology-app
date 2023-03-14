<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movie_id',
        'rating',
        'review',
    ];
     /**
     * One to many relationship with User class.
     *
     * i.e A user can have many reviews.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * One to many relationship with Movie class.
     *
     * i.e A movie can have many reviews.
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

}
