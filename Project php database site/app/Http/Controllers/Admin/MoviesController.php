<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:index Movie', ['only' => ['index']]);
        $this->middleware('permission:show Movie', ['only' => ['show']]);
        $this->middleware('permission:create Movie', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit Movie', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete Movie', ['only' => ['delete', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('admin.movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MovieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieStoreRequest $request)
    {
        $movie = new Movie();
        $movie->name        = $request->name;
        $movie->description = $request->description;
        $movie->genre_id    = $request->genre_id;
        $movie->save();
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show',compact('movie'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('admin.movies.edit', compact('movie','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $movie -> name = $request->name;
        $movie -> description = $request->description;
        $movie -> genre_id = $request ->genre_id;
        $movie ->save();

        return redirect()->route('movies.index')->with('status', 'movie updated :)');
    }

    public function delete(Movie $movie)
    {
        return view('admin.movies.delete', compact('movie'));
    }

public function destroy(Movie $movie)
{
    $movie->delete();
    return redirect()->route('movies.index')->with('status', 'Movie Deleted');
}
}
