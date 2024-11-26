<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Album;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::id()){
            return redirect()->route('register');
        }
        $user = User::find(Auth::id());
        $tags = Tag::orderBy('name','ASC')->get();
        return view('post.createpost', compact('tags','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tags' => 'required',
            'images' => 'required',
            'title' => 'required|min:5',
            'description' => 'min:5',
            ]);


        $post = new Post();
        //transformando as tags em array e json
        $tags = $request->tags;
        $jsonTags = [];
        foreach($tags as $tag){
            $jsonTags[] = $tag;
        }
        $post->tags_id = $jsonTags;
        
        
        
        
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->nsfw == 'on'){
            $post->nsfw = 1;
        }
        if($request->private == 'on'){
            $post->private = 1;
        }
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
        $userId = Auth::id();
        $user = User::find($userId);
        $post = Post::find($id);
        if($post){
            if($post->private != 0){
                if($userId != $post->user_id and $user->profile != 'admin'){
                    return redirect()->route('home');
                }
            }

            $comments = Comment::where('post_id', $id)->get();
            $totalComments = count(comment::where('post_id', $id)->get());
            $likes = count(Like::where('post_id', $id)->get());
            
            $albums = Album::where('user_id', $userId)->get();
            
        
            $tags = [];
            foreach($post->tags_id as $tag){
                $tags[] = Tag::find($tag);
            }
            return view('post.showpost', compact('post','tags','albums','comments','likes','user'));
        }
        return redirect()->route('home');
    }
        
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $post = Post::find($id);
        if($post){
            if($userId != $post->user_id and $user->profile != 'admin'){
                return redirect()->route('home');
            }
            $tags = Tag::orderBy('name', 'ASC')->get();
        }
        return view('post.editpost', compact('tags', 'post','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'tags' => 'required',
            'title' => 'required|min:5',
            'description' => 'min:5',
            ]);
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
        if($request->nsfw == 'on'){
            $post->nsfw = 1;
        }
        if($request->private == 'on'){
            $post->private = 1;
        }

        $post->save();

        return redirect()->route('post.show', ['id' => $id]);
    }

    public function comment(request $request){

        $user = Auth::id();
        $comment = new Comment();

        $comment->user_id = $user;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;

        $comment->save();

        return redirect()->route('post.show', ['id' => $request->post_id]);
    }

    public function like(request $request){
        $like = new Like();

        $like->user_id = Auth::id();
        $like->post_id = $request->post_id;
        $like->save();

        return redirect()->route('post.show', ['id' => $request->post_id]);
    }

    public function saveInAlbum(string $id, string $idAlbum){

        $userId = Auth::id();
        $user = User::find($userId);
        $album = Album::find($idAlbum);

        $post = Post::find($id);
        $tags = [];
        foreach($post->tags_id as $tag){
            $tags[] = Tag::find($tag);
        }
        return view('post.saveInAlbum', compact('post','tags','album','user'));
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
