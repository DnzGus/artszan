<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->description = $request->description;

        $tag->save();

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::find($id);

        return view('tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);

        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tag::find($id);

        $tag->name = $request->name;
        $tag->description = $request->description;

        $tag->save();

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);

        $tag->delete();
        
        return redirect()->route('tag.index');
    }
}
