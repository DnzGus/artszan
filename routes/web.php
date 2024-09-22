<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

                                 //visitor//

Route::get('/profile', [VisitorController::class, 'index'])->name('profile.index');

Route::get('/profile/create', [VisitorController::class, 'create'])->name('profile.register');

Route::post('/profile', [VisitorController::class, 'store'])->name('profile.store');

Route::get('/profile/{id}', [VisitorController::class, 'show'])->name('profile.show');

Route::get('/profile/{id}/edit', [VisitorController::class, 'edit'])->name('profile.edit');

Route::put('/profile/{id}', [VisitorController::class, 'update'])->name('profile.update');

Route::delete('profile/{id}', [VisitorController::class, 'destroy'])->name('profile.destroy');
