<?php

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

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')
    ->group(function () {
        Route::get('{user}/follow', 'FollowController@followUser')->name('follow');
        Route::get('{user}/unfollow', 'FollowController@unfollowUser')->name('unfollow');
        Route::get('{user}/accept', 'FollowController@acceptFollowRequest')->name('accept_follow_request');
        Route::get('{user}/followers', 'FollowController@showFollowers')->name('followers');
        Route::get('{user}/followings', 'FollowController@showFollowings')->name('followings');
    });

Route::middleware('auth')->get('/', 'HomeController@index')->name('home');

Route::middleware('auth')
    ->name('post.')
    ->prefix('post/')
    ->group(function () {
        Route::get('create', 'PostController@create')->name('create');
        Route::post('', 'PostController@store')->name('store');
        Route::get('{post}/edit', 'PostController@edit')->name('edit')->middleware('can:update,post');
        Route::put('{post}', 'PostController@update')->name('update')->middleware('can:update,post');
        Route::delete('{post}', 'PostController@destroy')->name('destroy')->middleware('can:update,post');
    });
Route::get('post/{post}', 'PostController@show')->name('post.show');

Route::post('post/{post}/comment', 'CommentController@store')->name('comment.store')->middleware('auth');
Route::get('comment/{comment}/edit', 'CommentController@edit')->name('comment.edit')->middleware('auth','can:update,comment');
Route::post('comment/{comment}', 'CommentController@update')->name('comment.update')->middleware('auth','can:update,comment');
Route::delete('{comment}/delete', 'CommentController@destroy')->name('comment.destroy')->middleware(['auth', 'can:delete,comment']);

Route::get('post/{post}/like', 'LikeController@like')->name('like')->middleware('auth');
Route::get('post/{post}/unlike', 'LikeController@unlike')->name('unlike')->middleware('auth');
Route::get('post/{post}/likes', 'LikeController@showLikedUsers')->name('liked.users');

Route::get('{user}', [ProfileController::class, 'index'])->name('profile.show');

Route::middleware('auth')
    ->name('account.')
    ->prefix('account/')
    ->group(function () {
        Route::get('edit', 'ProfileController@edit')->name('edit');
        Route::post('edit', 'ProfileController@update')->name('update');
    });
