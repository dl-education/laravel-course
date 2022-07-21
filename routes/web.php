<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Comments;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('posts', Posts::class)->parameters(['posts' => 'id']);
Route::resource('comments', Comments::class)->parameters(['comments' => 'id']);