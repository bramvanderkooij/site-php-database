<?php

namespace App\Http\Controllers\open;

use App\Http\Controllers\Controller;
use App\Models\Forums;
use App\Models\Threads;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forums::all();
        return view('open.forum.index', compact('forums'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function show(Forums $forum)
    {
        $allThreads = Threads::all();
        $threads = [];
        foreach ($allThreads as $thread) {
            if ($thread->forum_id == $forum->id)
                $threads[] = $thread;
        }

        return view('open.forum.show', compact('forum','threads'));
    }
}
