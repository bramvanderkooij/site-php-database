<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(15),
            'downloadlink' => $this->faker->text(200),
            'tag_id' => Tag::all()->random()->id
        ];
    }
}
