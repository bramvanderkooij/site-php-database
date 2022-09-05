<?php

use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\open\ForumController;
use App\Http\Controllers\open\MovieController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\Admin\GenreController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TagsController;
use \App\Http\Controllers\open\GameController;
use \App\Http\Controllers\GamesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('layouts.layout');
});

Route::get('/about', function () {
    return view('public.about');
});


Route::get('/admin/tags/{tag}/delete', [TagsController::class, 'delete'])->name('tags.delete');
Route::resource('/admin/tags', TagsController::class);

Route::get('/admin/games/{game}/delete', [GamesController::class, 'delete'])->name('games.delete');
Route::resource('/admin/games', GamesController::class);

Route::resource('/admin/forums', ForumsController::class);
Route::get('/admin/forums/{forum}/delete', [ForumsController::class, 'delete'])->name('forums.delete');

Route::resource('/public/forum', ForumController::class);

Route::resource('/public/game', GameController::class);

Route::resource('/public/movie', MovieController::class);

Route::get('/admin/threads/{thread}/delete', [ThreadsController::class, 'delete'])->name('threads.delete');
Route::resource('/admin/threads', ThreadsController::class);

Route::group(['middleware' => ['role:customer|sales|admin']], function() {
Route::get('/admin/genres/{genre}/delete', [GenreController::class, 'delete'])
    ->name('genres.delete');
Route::resource('/admin/genres',GenreController::class);
});

Route::group(['middleware' => ['role:customer|sales|admin']], function() {
    Route::get('/admin/movies/{movie}/delete', [MoviesController::class, 'delete'])
        ->name('movies.delete');
    Route::resource('/admin/movies',GenreController::class);
});

Route::resource('/admin/movies',MoviesController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
