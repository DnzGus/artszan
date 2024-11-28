<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;


Auth::routes();

Route::get('/', [function(){ 
    return redirect()->route('feed.index');
}]);
Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');

Route::get('/feed/search', [FeedController::class, 'search'])->name('feed.search');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');


Route::middleware(['auth'])->group(function () {
    
    
    Route::middleware(['can:isAdmin'])->group(function () {
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        
        //tags//
        Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
        
        Route::get('/tag/create', [TagController::class, 'create'])->name('tag.register');
        
        Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
        
        Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag.show');
        
        Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
        
        Route::put('/tag/{id}', [TagController::class, 'update'])->name('tag.update');
        
        Route::delete('tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
        
    });
    
    //posts//
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    
    Route::post('/post/{id}/comment', [PostController::class, 'comment'])->name('post.comment');
    
    Route::post('/post/{id}/like', [PostController::class, 'like'])->name('post.like');

    Route::delete('/post/{id}/unlike', [PostController::class, 'unLike'])->name('post.unlike');
    
    Route::get('/post/album/{id}/{idAlbum}', [PostController::class, 'saveInAlbum'])->name('post.saveInAlbum');
    
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');
    
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    
    //album//
    
    Route::get('/albums', [AlbumController::class, 'index'])->name('album.index');
    
    Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');
    
    Route::post('/album', [AlbumController::class, 'store'])->name('album.store');
    
    Route::get('/album/{id}', [AlbumController::class, 'show'])->name('album.show');
    
    Route::get('/album/{id}/edit', [AlbumController::class, 'edit'])->name('album.edit');
    
    Route::put('/album/{id}', [AlbumController::class, 'update'])->name('album.update');
    
    Route::delete('/album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
    
    //feed//
    
    
    Route::get('/feed/mostnew', [FeedController::class, 'getNews'])->name('feed.news');
    
    Route::get('/feed/liked', [FeedController::class, 'getLikeds'])->name('feed.liked');
    
    Route::get('/feed/tag/{idSearch}',[FeedController::class, 'searchTag'])->name('feed.search.tag');
    
    Route::get('/feed/user/{idSearch}',[FeedController::class, 'searchUser'])->name('feed.search.user');
    
    //perfil//
    
    Route::get('/profile', [ProfileController::class, 'redir'])->name('profile.redir');
    
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profile.index');
    
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/profile/images/{id}', [ProfileController::class, 'showImages'])->name('profile.showImages');
    
    Route::get('/profile/albums/{id}', [ProfileController::class, 'showAlbums'])->name('profile.showAlbums');
    
    //follow//
    Route::get('/follow/{id}',[FollowerController::class, 'follow'])->name('follow');

    Route::delete('/unFollow/{id}',[FollowerController::class, 'unFollow'])->name('unfollow');
});


