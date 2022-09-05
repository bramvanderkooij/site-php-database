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


test('guest cannot create a movie', function()
{
    $this->postJson(route('movie.store'))
        ->assertStatus(500);

})->group('MovieStore');

test('customer cannot create a movie', function()
{
    $customer = User::find(1);
    laravel\be($customer)
        ->postJson(route('movies.store'))
        ->assertForbidden();
})->group('MovieStore');

test('sales can create a movie', function()
{
    $sales = User::find(2);
    $movie = Movie::factory()->make();
    $genre = Genre::factory()->make();

    laravel\be($sales)
        ->postJson(route('movies.store'), $movie->toArray())
        ->assertRedirect(route('movies.index'));

    $this->assertDatabaseHas('movies',[
        'name' => $movie->name,
        'description' => $movie->description
    ]);


})->group('MovieStore');


test('admin can create a movie', function()
{
    $admin = User::find(3);
    $movie = Movie::factory()->make();
    $genre = Genre::factory()->make();

    laravel\be($admin)
        ->postJson(route('movies.store'), $movie->toArray())
        ->assertRedirect(route('movies.index'));

    $this->assertDatabaseHas('movies',[
        'name' => $movie->name,
        'description' => $movie->description
    ]);


})->group('MovieStore');
