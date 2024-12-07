<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index() {
        $tags = Tag::all();
        $posts = Post::where('private', '0')->get();
        return view('feed.indexfeed', compact('posts','tags'));
    }

    public function search(request $request) {
        $tags = Tag::all();
        $posts = Post::where('title', 'like', "%$request->search%")->orWhere('description', 'like', "%$request->search%")->get();
        return view('feed.indexfeed', compact('posts','tags','users'));
    }

    public function getNews() {
        $tags = Tag::all();
        $posts = Post::where('private', '0')->latest()->get();
        return view('feed.indexfeed', compact('posts', 'tags'));
    }

    public function getLikeds() {
        $tags = Tag::all();
        $userId = Auth::id();
        $likeds = Like::where('user_id', $userId)->get();
        $posts = [];
        foreach($likeds as $like){
            $posts[] = Post::find($like->post_id);
        }
        return view('feed.indexfeed', compact('posts', 'tags'));
    }

    public function searchTag(string $idSearch){
        $tags = Tag::all();
        $posts = Post::all();
        $searchPost = [];
        foreach($posts as $post){
            foreach($post->tags_id as $tagId){
                if($tagId == $idSearch){
                    $searchPost[] = $post->id;
                }
            }
        }
        $sendPosts = [];
        foreach($searchPost as $postId){
            $sendPosts[] = Post::find($postId);
        }
        return view('feed.searchtagfeed', compact('sendPosts','tags'));
    }

    public function searchUser(string $idSearch){
        $user = User::find($idSearch);
        $posts = Post::all();

        $sendPosts = [];
        foreach($posts as $post){
            if($post->user_id == $user->id){
                $sendPosts[] = $post;
            }
        }
        return view('feed.searchuserfeed', compact('sendPosts','user'));
    }
}
