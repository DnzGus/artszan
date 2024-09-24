<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

                                 //visitor//

Route::get('/profile', [VisitorController::class, 'index'])->name('profile.index');

Route::get('/profile/create', [VisitorController::class, 'create'])->name('profile.register');

Route::post('/profile', [VisitorController::class, 'store'])->name('profile.store');

Route::get('/profile/changepassword', [VisitorController::class, 'updatePass'])->name('profile.changepassword');

Route::put('/profile/{id}', [VisitorController::class, 'storePass'])->name('profile.storepassword');

Route::get('/profile/{id}', [VisitorController::class, 'show'])->name('profile.show');

Route::get('/profile/{id}/edit',[VisitorController::class, 'edit'])->name('profile.edit');

                                //tags//

Route::get('tag', [TagController::class, 'index'])->name('tag.index');

Route::get('/tag/create', [TagController::class, 'create'])->name('tag.register');

Route::post('/tag', [TagController::class, 'store'])->name('tag.store');

Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag.show');

Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');

Route::put('/tag/{id}', [TagController::class, 'update'])->name('tag.update');

Route::delete('tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
