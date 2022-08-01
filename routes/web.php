<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Comments as CommentController;
use App\Http\Controllers\Admin\Category as CategoryAdminController;
use App\Http\Controllers\Admin\Main as MainAdminController;
use App\Http\Controllers\Admin\Posts as PostsAdminController;
use App\Http\Controllers\Admin\Trush as TrushCategoryController;
use App\Http\Controllers\Admin\Video as VideoAdminController;
use App\Http\Controllers\Admin\Tag as TagsAdminController;
use App\Http\Controllers\Posts as PostsController;
use App\Http\Controllers\Video as VideoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('/admin')->group( function () {
    Route::get('/', [ MainAdminController::class, 'index' ])->name('main.admin');
    Route::get('/declinedComments', [ MainAdminController::class, 'declinedComments'])->name('comment.declined');
    Route::get('/acceptedComments', [ MainAdminController::class, 'acceptedComments'])->name('comment.accepted');
        Route::prefix('/trush')->group( function () {
            Route::get('/', [ TrushCategoryController::class, 'index'])->name('trush');
            Route::delete('/{id}/deleteForever', [ TrushCategoryController::class, 'deleteForever'])->name('deleteForever');
            Route::put('/restoreOne', [ TrushCategoryController::class, 'restoreOne'])->name('restoreOne');
            Route::post('/restoreAll', [ TrushCategoryController::class, 'restoreAll'])->name('restoreAll');
            Route::delete('/deleteAll', [ TrushCategoryController::class, 'deleteAll'])->name('deleteAll');
        });
    Route::resource('/categories', CategoryAdminController::class);
    Route::resource('/posts', PostsAdminController::class)->parameters(['posts' => 'id']);
    Route::resource('/video', VideoAdminController::class)->parameters(['video' => 'id']);
    Route::resource('/tags', TagsAdminController::class)->parameters(['tags' => 'id']);
    
    
    Route::get('/comments/{id}/accept', [ CommentController::class, 'acceptComment'])->name('accept.comment');
    Route::get('/comments/{id}/decline', [ CommentController::class, 'declineComment'])->name('decline.comment');
    Route::resource('/comments', CommentController::class)->only(['index','store', 'edit', 'update', 'destroy'])->parameters([ 'comments' => 'id' ]);
});


Route::get('/posts', [ PostsController::class, 'index'])->name('post.all');
Route::get('/post/{slug}', [ PostsController::class, 'show' ])->name('post.one');
Route::get('/{url}/posts', [ PostsController::class, 'showPostsForTag' ])->name('tag.posts');
Route::get('/tags', [ PostsController::class, 'showTags' ])->name('tags.all');
Route::get('/videos', [ VideoController::class, 'index'])->name('video.all');
Route::get('/video/{slug}', [ VideoController::class, 'show'])->name('video.one');

