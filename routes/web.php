<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Videos;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Auth\Session;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Profile\Password as ProfilePassword;
use App\Http\Controllers\Address;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth', 'verified')->prefix('admin')->group(function(){
    Route::resource('tags', Tags::class)->parameters(['tags' => 'id'])->middleware('can:admin-tags');
    Route::resource('posts', Posts::class)->parameters(['posts' => 'id']);
    Route::resource('videos', Videos::class)->parameters(['videos' => 'id']);

    Route::controller(ProfilePassword::class)->prefix('profile')->withoutMiddleware('verified')->group(function(){
        Route::get('/password', 'edit')->name('profile.password.edit');
        Route::put('/password', 'update')->name('profile.password.update');
    });

    Route::controller(Address::class)->group(function(){
        Route::get('/address', 'form')->name('address.form');
        Route::post('/address', 'parse')->name('address.parse');
    });
});

Route::get('/static/verify-email', function(){
    return 'please verify email';
})->name('verification.notice');

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