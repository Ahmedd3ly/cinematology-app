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
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(3),
            'director' => $this->faker->name(),
            'release_date' => $this->faker->date(),
            'genre' => $this->faker->randomElement(
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
            'poster' => $this->faker->imageUrl(),
            'rating' => $this->faker->numberBetween(1, 5),

        ];
    }
}
