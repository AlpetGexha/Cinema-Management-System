<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'category_id' => Category::factory(),
            'director' => $this->faker->name,
            'release_date' => $this->faker->date,
            'synopsis' => $this->faker->paragraph,
        ];
    }
}
