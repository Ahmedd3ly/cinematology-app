<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

     /**
     * Many to many relationship with Movie class.
     *
     * i.e A cast can have many movies.
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
