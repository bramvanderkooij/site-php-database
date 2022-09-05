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


test('guest cannot see the movie edit page', function()
{
    $this->get(route('movies.edit',[ 'movie' => $this->movie->id]))
        ->assertRedirect(route('login'));
})->group('MovieEdit');

test('customer cannot see the movie edit page', function()
{
    $customer = User::find(1);
    laravel\be($customer)
        ->get(route('movies.edit',[ 'movie' => $this->movie->id]))
        ->assertForbidden();
})->group('MovieEdit');



test('sales can create a movie', function() {
    $sales = User::find(2);
    $movie = Movie::factory()->make();
    $genre = Genre::factory()->make();

    laravel\be($sales)
        ->get(route('movies.edit', ['movie' => $this->movie->id]))
        ->assertViewIs('admin.movies.edit')
        ->assertSee($this->genre->name)
        ->assertSee($this->movie->name)
        ->assertSee($this->movie->description)
        ->assertStatus(200);
})->group('MovieEdit');

test('admin can create a movie', function()
{
    $admin = User::find(3);
    $movie = Movie::factory()->make();
    $genre = Genre::factory()->make();

    laravel\be($admin)
        ->get(route('movies.edit', ['movie' => $this->movie->id]))
        ->assertViewIs('admin.movies.edit')
        ->assertSee($this->genre->name)
        ->assertSee($this->movie->name)
        ->assertSee($this->movie->description)
        ->assertStatus(200);
})->group('MovieEdit');
