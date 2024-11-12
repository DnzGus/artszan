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
        
        $post = new Post();
        
        $tags = $request->tags;
        //transformando as tags em array e json
        $jsonTags = [];
        foreach($tags as $tag){
            $jsonTags[] = $tag;
        }
        $post->tags_id = $jsonTags;
        
        //tranformando as imagens em base64
        $totalImages = count($request->images);
        $jsonImages = []; 
        for($i = 0; $i < $totalImages; $i++){
            $content = $request->file("images");
            $image = file_get_contents($content[$i]);
            $image64 = base64_encode($image);
            $jsonImages[] = $image64;
        }

        $post->images = $jsonImages;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
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
        // $tags = Tag::find(); ajeitar pra buscar as tags certas!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
