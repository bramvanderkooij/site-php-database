<?php

namespace Database\Factories;

use App\Models\Forums;
use App\Models\Threads;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Threads::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->name,
            'message'=>$this->faker->text,
            'forum_id'=> Forums::all()->random()->id
        ];
    }
}
