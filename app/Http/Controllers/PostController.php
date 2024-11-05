<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::orderBy('name','ASC')->get();
        return view('post.createpost', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tags = $request->tags;
        $contents = $request->file('image');

        $post = new Post();

        //transformando as tags em array e json
        $jsonTags = [];
        foreach($tags as $tag){
            $jsonTags[] = $tag;
        }
        $post->tags_id = $jsonTags;
        
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = base64_encode(file_get_contents($contents));
        $post->nsfw = $request->nsfw;

        $post->save();

        return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.showpost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tag::orderBy('name', 'ASC')->get();
        $post = Post::find($id);
        return view('post.editpost', compact('tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $post = Post::find($id);
        $post->tags_id = $request->tag;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->nsfw = $request->nsfw;

        $post->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home');
    }
}
