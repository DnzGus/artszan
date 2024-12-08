<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Album;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image as Intervention;

class AlbumController extends Controller
{
    public function index(){

        $user_id = Auth::id();
        $albums = Album::where('user_id', $user_id)->get();

        return view('album.indexalbum', compact('albums'));
    }
    public function create(){

        $user_id = Auth::id();
        $posts = Post::where('user_id', $user_id)->get();

        return view('album.createalbum', compact('posts'));
    }

    public function store(request $request){

        $user_id = Auth::id();

        $album = new Album;
        $album->title = $request->title;
        $album->user_id = $user_id;
        if($request->images){
            $album->images_id = $request->images;
        }
        $album->private = $request->private;

        $album->save();

        return redirect()->route('profile.showAlbums', ['id' => $user_id]);
    }

    public function edit(string $id){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $album = Album::find($id);
        if($userId != $album->user_id and $user->profile != 'admin'){
            return redirect()->route('home');
        }
        $posts = Post::all();

        return view('album.editAlbum', compact('album','posts'));
    }

    public function update(string $id, request $request){

        $album = Album::find($id);
        $user_id = Auth::id();
        if($user_id != $album->user_id){
            return  redirect()->route('feed.index');
        }

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
            if($images){
            foreach($request->images as $idImages){
                    if(in_array($idImages,$images)){
                        continue;
                    }
                    array_push($images, $idImages);
                }
            }else{
                $images = [];
                foreach($request->images as $idImages){
                    array_push($images, $idImages);
                }
            }
        }

        $album->images_id = $images;
        $album->save();

        return redirect()->route('album.show', ['id' => $album->id]);
    }

    public function show(string $id){

        $user_id = Auth::id();
        $user = User::find($user_id);
        $album = Album::find($id);
        $follows = Follow::where('user_id', $user_id)->where('follows_id', $album->user->id)->exists();
        if($album){
            if($album->private != 0){
                if($user_id != $album->user_id and $user->profile != 'admin'){
                    return redirect()->route('home');
                }
            }
            foreach($album->images_id as $image){
                $posts = Post::all();
            }
            return view('album.showalbum', compact('album','posts','user','follows'));
        }
        return redirect()->route('feed.index');
    }

    public function destroy(string $id)
    {
        $album = ALbum::find($id);
        $album->delete();
        return redirect()->route('feed.index');
    }
}
