<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Videos;
use App\Http\Controllers\Comments;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('tags', Tags::class)->parameters(['tags' => 'id']);
Route::resource('posts', Posts::class)->parameters(['posts' => 'id']);
Route::resource('videos', Videos::class)->parameters(['videos' => 'id']);
Route::resource('comments', Comments::class)->parameters(['comments' => 'id']);