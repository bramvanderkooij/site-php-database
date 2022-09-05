<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tag;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = game::all();
        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.games.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = new game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->downloadlink = $request->downloadlink;
        $game->tag_id = $request->tag_id;
        $game->save();
        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $games
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game, Request $request)
    {
        $tags = tag::all();
        $tagName='';
        foreach ($tags as $tag){
        if($tag->id==$game->tag_id){
        $tagName=$tag->name;
    }
        }
        $game->tag_id = $request->tag_id;
        return view('admin.games.show', compact('game','tagName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $games
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $tags = tag::all();
        return view('admin.games.edit', compact('game', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $games
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $game->name = $request->name;
        $game->name = $request->name;
        $game->description = $request->description;
        $game->downloadlink = $request->downloadlink;
        $game->tag_id = $request->tag_id;
        $game->save();

        return redirect()->route('games.index')->with('status', 'geupdate');
    }

    public function delete(Game $game)
    {
        $tags = tag::all();
        return view('admin.games.delete', compact('game', 'tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $games
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('status', 'game verwijderd');
    }
}
