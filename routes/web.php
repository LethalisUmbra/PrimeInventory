<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TranslationController;

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
Route::post('changelocale', [TranslationController::class, 'changeLocale'])->name('changelocale');

// Weapons
// Route::get('/primary/rifle', [WeaponController::class, 'rifle'])->name('weapon.rifle');
Route::get('/primary/shotgun', [WeaponController::class, 'shotgun'])->name('weapon.shotgun');
// Route::get('/primary/bow', [WeaponController::class, 'bow'])->name('weapon.bow');
// Route::get('/primary/crossbow', [WeaponController::class, 'crossbow'])->name('weapon.crossbow');

// Sections
Route::view('/primary', 'primary.index')->name('primary')->middleware('auth');

// Posts
Route::resource('/post', PostController::class)
->names('post');

// Auth
Auth::routes(['verify' => true]);