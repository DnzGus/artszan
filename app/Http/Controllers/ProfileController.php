<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show(){

        $id = Auth::id();
        $profile = User::find($id);

        return view('profile.showprofile', compact('profile'));
    }

    public function edit(){
        $id = Auth::id();
        $profile = User::find($id);

        return view('profile.editprofile', compact('profile'));
    }

    public function update(request $request){

        $id = Auth::id();
        $profile = User::find($id);

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

        return redirect()->route('profile.show');
    }
}