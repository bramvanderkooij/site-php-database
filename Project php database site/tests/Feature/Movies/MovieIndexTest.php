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


test('guest cannot see the product index page', function()
{
    $this->get(route('movies.index'))
        ->assertRedirect(route('login'));
})->group('MovieIndex');


test('customer cannot see the product index page', function()
{
    $customer = User::find(1);
    laravel\be($customer)
        ->get(route('movies.index'))
        ->assertForbidden();

})->group('MovieIndex');


test('sales can see the product index page', function()
{
    $sales = User::find(2);
    laravel\be($sales)
        ->get(route('movies.index'))
        ->assertSee($this->movie->name)
        ->assertSee($this->movie->genre->name)
        ->assertStatus(200);

})->group('MovieIndex');


test('admin can see the product index page', function()
{
    $admin = User::find(3);
    laravel\be($admin)
        ->get(route('movies.index'))
        ->assertSee($this->movie->name)
        ->assertSee($this->movie->genre->name)
        ->assertStatus(200);

})->group('MovieIndex');
