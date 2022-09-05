<?php

namespace App\Http\Controllers;

use App\Models\Forums;
use App\Models\Threads;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Threads::all();
        return view('admin.threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forums = Forums::all();
        return view('admin.threads.create',compact('forums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thread = Threads::create(['title' => $request->title, 'message' => $request->message, 'forum_id' => $request->forum_id]);

        return redirect()->route('threads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function show(Threads $thread)
    {
        return view('admin.threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function edit(Threads $thread)
    {
        $forums = Forums::all();
        return view('admin.threads.edit', compact('thread','forums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Threads $thread)
    {
        $thread->title = $request->title;
        $thread->message = $request->message;
        $thread->forum_id = $request->forum_id;

        $thread->save();

        return redirect()->route('threads.index')->with('status', 'threads geupdate');
    }

    public function delete(Threads $thread)
    {
        return view('admin.threads.delete', compact('thread'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Threads  $threads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Threads $thread)
    {
        $thread->delete();
        return redirect()->route('threads.index')->with('status', 'thread verwijderd');
    }
}
