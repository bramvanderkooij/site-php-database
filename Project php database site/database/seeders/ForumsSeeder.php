<?php

namespace Database\Seeders;

use App\Models\Forums;
use Illuminate\Database\Seeder;

class ForumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forums::factory()
            ->times(5)
            ->create();
    }
}
