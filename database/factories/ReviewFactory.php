<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Review::class;

    public function definition(): array
    {
        $users = User::all();
        $movies = Movie::all();
        return [
            'user_id'  => fake()->numberBetween(1, $users->count()),
            'movie_id' => fake()->numberBetween(1, $movies->count()),
            'rating'   => fake()->numberBetween(1, 5),
            'review'   => fake()->paragraph(3),
        ];
    }
}
