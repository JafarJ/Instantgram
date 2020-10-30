<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::post('like/{post}', [App\Http\Controllers\likesController::class, 'store']);
Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/explore/top', [App\Http\Controllers\PostsController::class, 'explore_top']);
Route::get('/explore/recent', [App\Http\Controllers\PostsController::class, 'explore_recent']);
Route::get('/explore/recent', [App\Http\Controllers\PostsController::class, 'explore_recent']);
Route::get('/liked', [App\Http\Controllers\PostsController::class, 'liked']);

Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::PATCH('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
