<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;


class AlbumController extends Controller
{
    public function create(){

        $user = Auth::id();
        $posts = Post::where('user_id', $user)->get();

        return view('album.createalbum', compact('posts'));
    }

    public function store(request $request){
        
        $user = Auth::id();

        $album = new Album;
        $album->title = $request->title;
        $album->user_id = $user;
        $album->images_id = $request->images;
        $album->private = $request->private;

        $album->save();

        return redirect()->route('album.create');
    }

    public function show(string $id){

        $album = Album::find($id);

        $posts = Post::all();

        return view('album.showalbum', compact('album','posts'));
    }
}
