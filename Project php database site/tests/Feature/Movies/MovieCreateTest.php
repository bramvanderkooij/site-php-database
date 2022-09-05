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


test('guest cannot see the movie create page', function()
{
    $this->get(route('movies.create'))
        ->assertRedirect(route('login'));
})->group('MovieCreate');


test('customer cannot see the movie create page', function()
{
    $customer = User::find(1);
    laravel\be($customer)
        ->get(route('movies.create'))
        ->assertForbidden();

})->group('MovieCreate');


test('sales can see the movie create page', function()
{
    $sales = User::find(2);
    laravel\be($sales)
        ->get(route('movies.create'))
        ->assertViewIs('admin.movies.create')
        ->assertStatus(200);

})->group('MovieCreate');


test('admin can see the movie create page', function()
{
    $admin = User::find(3);
    laravel\be($admin)
        ->get(route('movies.create'))
        ->assertViewIs('admin.movies.create')
        ->assertStatus(200);

})->group('MovieCreate');
