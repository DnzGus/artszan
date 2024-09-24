<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TagsController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

                                 //visitor//

Route::get('/profile', [VisitorController::class, 'index'])->name('profile.index');

Route::get('/profile/create', [VisitorController::class, 'create'])->name('profile.register');

Route::post('/profile', [VisitorController::class, 'store'])->name('profile.store');

Route::get('/profile/{id}', [VisitorController::class, 'show'])->name('profile.show');

                                //tags//

Route::get('tag', [TagController::class, 'index'])->name('tag.index');

Route::get('/tag/create', [VisitorController::class, 'create'])->name('tag.register');

Route::post('/tag', [VisitorController::class, 'store'])->name('tag.store');

Route::get('/tag/{id}', [VisitorController::class, 'show'])->name('tag.show');
