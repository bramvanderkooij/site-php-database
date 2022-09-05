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


test('guest     cannot see the movie edit page', function() {
    $movie= Movie::find(1);
    $genre= Genre::find(1);
        $this->patchJson(route('movies.update',[ 'movie' => $this->movie->id]),
            array_merge($movie->toArray(),$genre->toArray()))
        ->assertStatus(401);
})->group('MovieUpdate');


test('customer  cannot update a movie', function() {
    $customer = User::find(1);
    $movie= Movie::find(1);
    $genre= Genre::find(1);

    laravel\be($customer)
        ->patchJson(route('movies.update',[ 'movie' => $this->movie->id]),
        array_merge($movie->toArray(),$genre->toArray()))
        ->assertForbidden();
})->group('MovieUpdate');


test('sales can update a movie', function()
{
    $sales = User::find(2);
    $newgenre = Genre::factory()->create(['name' => 'IkHaatTesten']);
    laravel\be($sales)
        ->patchJson(route('movies.update', ['movie' => $this->movie->id]),
            ['name'=> 'Twee productnaam',
                'description'=>'bfssd',
                'genre_id' => $newgenre->id]
        );
    $this->movie = $this-> movie->fresh();

    $this->get(route('movies.index'))
        ->assertSee('Twee productnaam')
        ->assertSee($newgenre->name);

    $this->get(route('movies.index'))
        ->assertSee($this->movie->name)
        ->assertSee($this->movie->genre->name);

})->group('MovieUpdate');


test('admin can update a movie', function()
{
    $admin = User::find(3);
    $newgenre = Genre::factory()->create(['name' => 'TestGenre']);
    laravel\be($admin)
        ->patchJson(route('movies.update', ['movie' => $this->movie->id]),
        ['name'=> 'Een productnaam',
         'description'=>'blablableh',
         'genre_id' => $newgenre->id]
        );
    $this->movie = $this-> movie->fresh();

    $this->get(route('movies.index'))
        ->assertSee('Een productnaam')
        ->assertSee($newgenre->name);

    $this->get(route('movies.index'))
        ->assertSee($this->movie->name)
        ->assertSee($this->movie->genre->name);

})->group('MovieUpdate');
