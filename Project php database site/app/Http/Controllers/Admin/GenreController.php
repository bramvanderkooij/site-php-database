<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreStoreRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Models\Genre;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use throwable;


class GenreController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
    $this->middleware('permission:index Genre', ['only'=> ['index']]);
    $this->middleware('permission:show Genre', ['only'=> ['show']]);
    $this->middleware('permission:create Genre', ['only'=> ['create', 'store']]);
    $this->middleware('permission:edit Genre', ['only'=> ['edit', 'update']]);
    $this->middleware('permission:delete Genre', ['only'=> ['delete', 'destroy']]);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get genres
        $genres = Genre::all();

        //return a view with the $genres we just got
        return view('admin.genres.index', compact( 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(GenreStoreRequest $request)
    {
     $genre = new genre();
     $genre->name = $request->name;
     $genre->save();

        return redirect()->route('genres.index')->with('status','Genre aangemaakt');
    }

    /**
     * Display the specified resource
     */
    public function show(Genre $genre)
    {
        return view('admin.genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreUpdateRequest $request, Genre $genre)
    {
        $genre->name = $request->name;
        $genre->save();

        return redirect()->route('genres.index')->with('status','genre geupdate');
    }

    /**
     * show what will be Deleted before it gets destroyed
     * @param \App\models\Genre $genre
     * @return \Illuminate\Http\Response
     */

    public function delete(Genre $genre)
    {
        return view('admin.genres.delete', compact('genre'));
    }

    /**
     * follow through with the deletion
     */
    public function destroy(Genre $genre)
    {
        try{
            $genre->delete();
        }catch (throwable $error)
        {
            report($error);
            return redirect()->route('genres.index')->with('status','Genre is not empty, delete or move linked movies first.' );
        }
        return redirect()->route('genres.index')->with('message','Genre verwijderd');
    }
}
