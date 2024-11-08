<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class FeedController extends Controller
{
    public function feed() {
        $posts = Post::all();
        $tags = Tag::all();
        return view('feed.indexfeed', compact('posts','tags'));
    }
}
