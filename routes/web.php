<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\AlbumController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

                                //tags//

Route::middleware(['can:isAdmin'])->group(function () {

    
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

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/post/album/{id}/{idAlbum}', [PostController::class, 'saveInAlbum'])->name('post.saveInAlbum');

Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

                                //feed//

Route::get('/feed', [FeedController::class, 'feed'])->name('feed.index');

Route::get('/album', [AlbumController::class, 'index'])->name('album.index');

Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');

Route::post('/album', [AlbumController::class, 'store'])->name('album.store');

Route::get('/album/{id}', [AlbumController::class, 'show'])->name('album.show');

Route::get('/album/{id}/edit', [AlbumController::class, 'edit'])->name('album.edit');