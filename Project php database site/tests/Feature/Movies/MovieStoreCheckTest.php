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

function postProduct($overridesMovie = [])
{
    $movie = Movie::factory()->make($overridesMovie);
    return Laravel\postJson(route('movies.store',
        array_merge($movie->toArray())));
}

test('a movie requires a name', function(){
    $admin = User::find(3);
    Laravel\be($admin);
    postProduct(['name' => null])
        ->assertStatus(422);
})->group('MovieStoreCheck');

test('a movie name cannot be more then 45 chars', function(){
    $admin = User::find(3);
    Laravel\be($admin);
    postProduct(['name' => 'ewhkfqwhlfbrbkfqelfbewjbhqebfhefbrbfrhfbhrbfrhfbrhfbrhfbrhfrhfrhbfrfrhfbrhrbfhbfrhfbrhbfrhfbrh'])
        ->assertStatus(422);
})->group('MovieStoreCheck');

test('a movie must be unique', function(){
    $admin = User::find(3);
    $movie = Movie::factory()->create(['name' => 'Movie1']);
    Laravel\be($admin);
    postProduct(['name' => 'Movie1'])
        ->assertStatus(422);
})->group('MovieStoreCheck');

test('a movie requires a description', function(){
    $admin = User::find(3);
    Laravel\be($admin);
    postProduct(['description' => null])
        ->assertStatus(422);
})->group('MovieStoreCheck');
