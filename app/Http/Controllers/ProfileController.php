<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index(){

        $profiles = User::all();
        return view('profile.indexprofile', compact('profiles'));
    }

    public function redir(){

        $user_id = Auth::id();
        return redirect()->route('profile.showImages', ['id' => $user_id]);
    }
    public function showImages(string $id){

        $id = Auth::id();
        $profile = User::find($id);
        $posts = Post::where('user_id', $id)->get();
        $totalPosts = count($posts);
        $totalFollows = count(Follow::where('user_id', $id)->get());
        $totalFollowers = count(Follow::where('follows_id', $id)->get());
        return view('profile.showprofileImages', compact('profile','totalFollows','totalFollowers','totalPosts','posts'));
    }

    public function showAlbums(string $id){

        $id = Auth::id();
        $profile = User::find($id);
        $posts = Post::where('user_id', $id)->get();
        $albums = Album::where('user_id', $id)->get();
        $totalPosts = count($posts);
        $totalFollows = count(Follow::where('user_id', $id)->get());
        $totalFollowers = count(Follow::where('follows_id', $id)->get());
        return view('profile.showprofileAlbums', compact('profile','totalFollows','totalFollowers','totalPosts','albums'));
    }

    public function edit(string $id){

        $user_id = Auth::id();

        if($id != $user_id){
            return redirect()->route('home');
        }

        $profile = User::find($id);
        return view('profile.editprofile', compact('profile'));
    }

    public function update(request $request){

        $user_id = Auth::id();
        $profile = User::find($user_id);

        if($request->image){
            $validated = $request->validate([
            'imagem' => 'mimes:jpg,png',
            ]);
            $image = file_get_contents($request->file('image'));
            $image64 = base64_encode($image);
            $profile->profilephoto = $image64;
        }
        if($request->name){
            $validated = $request->validate([
            'name' => 'required|string|min:3',
            ]);
            $profile->name = $request->name;
        }
        if($request->email){
            $validated = $request->validate([
            'email' => 'unique:users,email',
            ]);
            $profile->email = $request->email;
        }
        if($request->dob){
            // $validated = $request->validate([
            //     'password' => 'required|string|min:8|confirmed',
            //     'tomorrow' => 'required']);
            $profile->dob = $request->dob;
        }

        $profile->save();

        return redirect()->route('profile.show', ['id' => $user_id]);
    }
}

