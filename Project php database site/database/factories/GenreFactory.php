<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{

protected $model = Genre::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'created_at' => $this->faker->dateTimeThisDecade(max:'now',timezone:'Europe/Amsterdam'),
            'updated_at' => $this->faker->dateTimeThisDecade(max:'now',timezone:'Europe/Amsterdam'),
        ];
    }
}
