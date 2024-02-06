<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));

        return [
            'title' => $faker->movie,
            'year' => fake()->year,
            'rank' => fake()->numberBetween(1, 20),
            'description' => $faker->overview,
            'genre' => $faker->movieGenre
        ];
    }
}
