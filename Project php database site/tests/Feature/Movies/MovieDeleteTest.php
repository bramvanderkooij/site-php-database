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


test('guest cannot see the movie Delete page', function()
{
    $this->get(route('movies.delete',[ 'movie' => $this->movie->id]))
        ->assertRedirect(route('login'));
})->group('MovieDelete');


test('customer cannot see the movie Delete page', function()
{
    $customer = User::find(1);
    laravel\be($customer)
        ->get(route('movies.delete',[ 'movie' => $this->movie->id]))
        ->assertForbidden();
})->group('MovieDelete');

test('sales cannot see the movie Delete page', function()
{
    $sales = User::find(2);
    laravel\be($sales)
        ->get(route('movies.delete',[ 'movie' => $this->movie->id]))
        ->assertForbidden();
})->group('MovieDelete');


test('admin can see the movie Delete page', function()
{
    $admin = User::find(3);
    laravel\be($admin)
        ->get(route('movies.delete', ['movie' => $this->movie->id]))
        ->assertViewIs('admin.movies.delete')
        ->assertSee($this->genre->name)
        ->assertSee($this->movie->name)
        ->assertSee($this->movie->description)
        ->assertStatus(200);
})->group('MovieDelete');
