<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FeedController extends Controller
{
    public function feed() {
        $posts = Post::all();
        return view('feed.indexfeed', compact('posts'));
    }
}
