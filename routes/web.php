<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

                                //tags//

Route::get('tag', [TagController::class, 'index'])->name('tag.index');

Route::get('/tag/create', [TagController::class, 'create'])->name('tag.register');

Route::post('/tag', [TagController::class, 'store'])->name('tag.store');

Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag.show');

Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');

Route::put('/tag/{id}', [TagController::class, 'update'])->name('tag.update');

Route::delete('tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
