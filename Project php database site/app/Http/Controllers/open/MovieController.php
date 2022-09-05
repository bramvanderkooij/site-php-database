<?php

namespace App\Http\Controllers\open;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $movies = movie::all();
        return view('open.movie.index', compact('movies'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Forums $forums
     * @return \Illuminate\Http\Response
     */

    public function show(Movie $movie)
    {
        return view('open.movie.show', compact('movie'));

    }
}


