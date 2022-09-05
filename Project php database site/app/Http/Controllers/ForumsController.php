<?php

namespace App\Http\Controllers;

use App\Models\Forums;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forums::all();
        return view('admin.forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forums = Forums::create(['name' => $request->name, 'description' => $request->description]);

        return redirect()->route('forums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function show(Forums $forum)
    {
        return view('admin.forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function edit(Forums $forum)
    {
        return view('admin.forums.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forums $forum)
    {
        $forum->name = $request->name;
        $forum->description = $request->description;

        $forum->save();

        return redirect()->route('forums.index')->with('status', 'forums geupdate');
    }

    public function delete(Forums $forum)
    {
        return view('admin.forums.delete', compact('forum'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forums  $forums
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forums $forum)
    {
        $forum->delete();
        return redirect()->route('forums.index')->with('status', 'forum verwijderd');
    }
}
