<?php
use Carbon\Carbon;
use App\Models\Genre;
use App\Models\Movie;
use \Pest\laravel;


beforeEach(function(){
    $this->genre = Genre::factory()->create();
    $this->movie = Movie::factory()->create();
});


test('a movie   is in a "Genre"', function (){
    expect($this->movie->genre)->toBeInstanceOf(Genre::class);
})->group('MovieUnit');

test('a movies "name" is a "string"', function (){
    expect($this->movie->name)->toBeString();
})->group('MovieUnit');

test('a movies "description" is a "string"', function (){
    expect($this->movie->description)->toBeString();
})->group('MovieUnit');

test('a movies "id" is an "int"', function (){
    expect($this->movie->id)->toBeInt();
})->group('MovieUnit');

test('a movies "created at" is a "datetime" ', function (){
    expect($this->movie->created_at)->toBeInstanceOf(Carbon::class);
})->group('MovieUnit');

test('a movies "updated at" is a "datetime" ', function (){
    expect($this->movie->updated_at)->toBeInstanceOf(Carbon::class);
})->group('MovieUnit');
