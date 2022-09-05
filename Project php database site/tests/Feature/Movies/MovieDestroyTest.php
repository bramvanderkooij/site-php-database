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


test('guest cannot destroy a movie', function()
{
    $this->Json('DELETE',route('movies.destroy',['movie'=>$this->movie->id]))
        ->assertStatus(401);
})->group('MovieDestroy');


test('customer cannot destroy a movie', function()
{
    $customer = User::find(1);
    laravel\be($customer);
        $this->Json('DELETE',route('movies.destroy',['movie'=>$this->movie->id]))
        ->assertForbidden();
})->group('MovieDestroy');

test('sales cannot destroy a movie', function()
{
    $sales = User::find(2);
    laravel\be($sales);
    $this->Json('DELETE',route('movies.destroy',['movie'=>$this->movie->id]))
        ->assertForbidden();
})->group('MovieDestroy');


test('admin can destroy a movie', function()
{
    $admin = User::find(3);
    laravel\be($admin);
    $this->Json('DELETE',route('movies.destroy',['movie'=>$this->movie->id]));
        $this->assertDatabaseMissing('movies',['id'=> $this->movie->id]);
})->group('MovieDestroy');
