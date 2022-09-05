<?php

namespace Database\Seeders;

use App\Models\Threads;
use Illuminate\Database\Seeder;

class ThreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Threads::factory()
            ->times(100)
            ->create();
    }
}
