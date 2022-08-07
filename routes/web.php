<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Videos;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Auth\Session;
use App\Http\Controllers\Blog;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::resource('tags', Tags::class)->parameters(['tags' => 'id']);
    Route::resource('posts', Posts::class)->parameters(['posts' => 'id']);
    Route::resource('videos', Videos::class)->parameters(['videos' => 'id']);
});

Route::resource('comments', Comments::class)->parameters(['comments' => 'id']);

Route::controller(Session::class)->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/auth/login', 'create')->name('login');
        Route::post('/auth/login', 'store')->name('login.store');
    });

    Route::middleware('auth')->group(function(){
        Route::get('/auth/logout', 'exit')->name('login.exit');
        Route::delete('/auth/logout', 'destroy')->name('login.destroy');
    });
});

Route::controller(Blog::class)->group(function(){
    Route::get('/tag/{url}', 'tag')->name('blog.tag');
});