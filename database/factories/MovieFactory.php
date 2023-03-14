<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     protected $model = Movie::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(2),
            'description' =>fake()->paragraph(3),
            'director' => fake()->name(),
            'release_date' => fake()->date(),
            'genre' => fake()->randomElement(
                [
                'Action',
                'Comedy',
                'Drama', 
                'Fantasy', 
                'Horror', 
                'Mystery', 
                'Romance', 
                'Thriller'
                ]),
            'poster' => fake()->imageUrl(),
            'rating' => fake()->numberBetween(1, 5),

        ];
    }
}
