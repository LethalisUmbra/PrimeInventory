<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\SearchController;

// Home
Route::get('/', [PostController::class, 'index'])->name('home');

// User Routes
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');

// Locale
Route::post('changelocale', [TranslationController::class, 'changeLocale'])->name('changeLocale');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search')->middleware('auth');

// Sections
Route::view('/primary', 'category.primary')->name('primary')->middleware('auth');
Route::view('/secondary', 'category.secondary')->name('secondary')->middleware('auth');
Route::view('/melee', 'category.melee')->name('melee')->middleware('auth');
Route::view('/warframe', 'category.warframe')->name('warframe')->middleware('auth');
Route::view('/companion', 'category.companion')->name('companion')->middleware('auth');
Route::view('/archwing', 'category.archwing')->name('archwing')->middleware('auth');

// Posts
Route::resource('/posts', PostController::class)
->names('post');

// Auth
Auth::routes(['verify' => true]);