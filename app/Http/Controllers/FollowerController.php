<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(string $id){

        $follow = new Follow();

        $follow->user_id = Auth::id();
        $follow->follows_id = $id;
        $follow->save();

        return redirect()->route('profile.index');
    }
}
