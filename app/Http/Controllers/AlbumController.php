<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;


class AlbumController extends Controller
{
    public function index(){

        $user = Auth::id();
        $albums = Album::where('user_id', $user)->get();

        return view('album.indexalbum', compact('albums'));
    }
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

    public function edit(string $id){

        $user = Auth::id();
        $album = Album::find($id);
        if($user != $album->user_id){
            return redirect()->route('home');
        }
        $posts = Post::all();

        return view('album.editAlbum', compact('album','posts'));
    }

    public function update(string $id, request $request){
        
        $album = Album::find($id);

        $images = $album->images_id;

        //edicao do album
        if($request->private){
            $album->private = $request->private;
        }
        if($request->title){
            $album->title = $request->title;
        }
        if($request->removeImages){
            foreach($request->removeImages as $removeId){
                foreach($album->images_id as $key => $imageId){
                    if($imageId == $removeId){
                        $images[$key] = null;
                    }
                }
            }
        }

        //recebendo imagem de um post
        if($request->images){
            foreach($request->images as $idImages){
            if(in_array($idImages,$images)){
                continue;
            }
            array_push($images, $idImages);
            }
        }

        $album->images_id = $images;
        $album->save();

        return redirect()->route('album.index');
    }

    public function show(string $id){

        $user = Auth::id();
        $album = Album::find($id);

        if($album->private != 0){
            if($user != $album->user_id){
                return redirect()->route('home');
            }
        }
        $posts = Post::all();

        return view('album.showalbum', compact('album','posts'));
    }

    public function destroy(string $id)
    {
        $album = ALbum::find($id);
        $album->delete();
        return redirect()->route('home');
    }
}
