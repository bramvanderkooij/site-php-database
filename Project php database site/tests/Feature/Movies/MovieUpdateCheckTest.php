<?php
use App\Models\User;
use App\Models\Genre;
use App\Models\Movie;
use \Pest\laravel;


beforeEach(function(){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->genre = Genre::factory()->create();
    $this->movie = Movie::factory()->create();

});

function patchProduct($overridesMovie = [])
{
    $movie = Movie::find(1)->make($overridesMovie);
    return Laravel\patchJson(route('movies.update', ['movie' => 1]),
    array_merge($movie->toArray()));
}

test('a movie requires a name', function(){
    $admin = User::find(3);
    Laravel\be($admin);
    patchProduct(['name' => null])
        ->assertStatus(422);
})->group('MovieUpdateCheck');

test('a movie name cannot be more then 45 chars', function(){
    $admin = User::find(3);
    Laravel\be($admin);
    patchProduct(['name' => 'ewhkfqwhlfbrbkfqelfbewjbhqebfhefbrbfrhfbhrbfrhfbrhfbrhfbrhfrhfrhbfrfrhfbrhrbfhbfrhfbrhbfrhfbrh'])
        ->assertStatus(422);
})->group('MovieUpdateCheck');

test('a movie must be unique', function(){
    $admin = User::find(3);
    $movie = Movie::factory()->create(['name' => 'Movie1']);
    Laravel\be($admin);
    patchProduct(['name' => 'Movie1'])
        ->assertStatus(422);
})->group('MovieUpdateCheck');

test('a movie requires a description', function(){
    $admin = User::find(3);
    Laravel\be($admin);
    patchProduct(['description' => null])
        ->assertStatus(422);
})->group('MovieUpdateCheck');
