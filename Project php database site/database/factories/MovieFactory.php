<?php

namespace Database\Factories;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
protected $model = Movie::class;

    public function definition()
    {
        return [
            'name' =>$this->faker->name,
            'description' => $this->faker->paragraph(15),
            'genre_id'=> Genre::all()->random()->id
        ];
    }
}
