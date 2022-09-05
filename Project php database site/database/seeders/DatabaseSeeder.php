<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            GenreSeeder::class,
            TagsSeeder::class,
            GenreSeeder::class,
            GenreEmptySeeder::class,
            GamesSeeder::class,
            MovieSeeder::class]);
        $this->call([ForumsSeeder::class,ThreadsSeeder::class]);
    }
}
