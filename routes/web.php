<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Comments as CommentController;
use App\Http\Controllers\Admin\Category as CategoryAdminController;
use App\Http\Controllers\Admin\Main as MainAdminController;
use App\Http\Controllers\Admin\Posts as PostsAdminController;
use App\Http\Controllers\Admin\Trush as TrushCategoryController;
use App\Http\Controllers\Admin\Video as VideoAdminController;
use App\Http\Controllers\Admin\Tag as TagsAdminController;
use App\Http\Controllers\Auth\Register as RegisterController;
use App\Http\Controllers\Auth\Session as SessionController;
use App\Http\Controllers\Posts as PostsController;
use App\Http\Controllers\Profile as ProfileController;
use App\Http\Controllers\Video as VideoController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('/admin')->middleware(['auth','verified'])->group( function () {
    Route::get('/', [ MainAdminController::class, 'index' ])->name('main.admin');
    Route::get('/declinedComments', [ MainAdminController::class, 'declinedComments'])->name('comment.declined');
    Route::get('/newComments', [ MainAdminController::class, 'showNewComments'])->name('comment.new');
    Route::get('/acceptedComments', [ MainAdminController::class, 'acceptedComments'])->name('comment.accepted');
    Route::get('/comment/{id}/accept', [ MainAdminController::class, 'acceptComment'])->name('accept.comment');
    Route::get('/comment/{id}/decline', [ MainAdminController::class, 'declineComment'])->name('decline.comment');
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
      
});

Route::resource('/comments', CommentController::class)->only(['store', 'edit', 'update', 'destroy'])->parameters([ 'comments' => 'id' ])->middleware(['auth']);

Route::get('/posts', [ PostsController::class, 'index'])->name('post.all');
Route::get('/post/{slug}', [ PostsController::class, 'show' ])->name('post.one');
Route::get('/{url}/posts', [ PostsController::class, 'showPostsForTag' ])->name('tag.posts');
Route::get('/tags', [ PostsController::class, 'showTags' ])->name('tags.all');
Route::get('/videos', [ VideoController::class, 'index'])->name('video.all');
Route::get('/video/{slug}', [ VideoController::class, 'show'])->name('video.one');

Route::controller(SessionController::class)->group(function() {
    Route::middleware('guest')->group(function() {
        Route::get('/auth/login', 'create')->name('login');
        Route::post('/auth/login', 'store')->name('login.store')->middleware('throttle:auth');
    });
    Route::middleware('auth')->group(function() {
        Route::get('/auth/logout', 'exit')->name('login.exit');
        Route::delete('/auth/logout', 'destroy')->name('login.destroy');
    });
});

Route::get('verify-email', function () {
    session()->flash('notification','auth.verify');
    return redirect()->route('home');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::controller(RegisterController::class)->middleware('guest')->group(function() {
    Route::get('/auth/register', 'create')->name('register');
    Route::post('/auth/register', 'store')->name('register.store');
});

Route::prefix('/profile')->middleware('auth')->group(function() {
    Route::get('/',[ ProfileController::class, 'index' ])->name('profile.index');
    Route::get('/password/edit', [ ProfileController::class, 'editPassword' ])->name('password.edit');
    Route::put('/password/update', [ ProfileController::class, 'updatePassword' ])->name('password.update');
});


