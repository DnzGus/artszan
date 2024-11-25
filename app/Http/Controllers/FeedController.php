<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class FeedController extends Controller
{
    public function feed() {
        $posts = Post::all();
        return view('feed.indexfeed', compact('posts'));
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
        return view('feed.searchuserfeed', compact('sendPosts'));
    }
}
