<?php

namespace App\Http\Controllers\open;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Tag;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = game::all();
        return view('open.game.index', compact('games'));

    }

    public function show(Game $game)
    {
        {
            $tags = tag::all();
            $tagName='';
            foreach ($tags as $tag) {
                if ($tag->id == $game->tag_id) {
                    $tagName = $tag->name;
                }
            }
            return view('open.game.show', compact('game', 'tagName'));
        }
    }
}

