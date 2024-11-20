<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Image;
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
        $post = new Post();
        
        $tags = $request->tags;
        //transformando as tags em array e json
        $jsonTags = [];
        foreach($tags as $tag){
            $jsonTags[] = $tag;
        }
        $post->tags_id = $jsonTags;
        
        
        
        
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->nsfw = $request->nsfw;
        
        $post->save();
        
        $totalImages = count($request->images);
        for($i = 0; $i < $totalImages; $i++){
            $image = new Image();
            $imageFile = file_get_contents($request->images[$i]);
            $image64 = base64_encode($imageFile);
            $image->image = $image64;
            $image->post_id = $post->id;
            $image->save();
        }

        return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $tags = [];
        foreach($post->tags_id as $tag){
            $tags[] = Tag::find($tag);
        }
        return view('post.showpost', compact('post','tags'));
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
        $tags = $request->tags;

        //transformando as tags em array e json
        $jsonTags = [];
        foreach($tags as $tag){
            $jsonTags[] = $tag;
        }

        $post->tags_id = $jsonTags;
        
        $post->user_id = Auth::id();
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
