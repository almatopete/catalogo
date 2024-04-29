<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'synopsis' => $this->faker->paragraph,
            'year' => $this->faker->year,
            'cover' => $this->faker->imageUrl(),
        ];
    }
}
