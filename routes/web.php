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


use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::middleware('auth')->get('/', 'HomeController@index')->name('home');


Route::middleware(['auth'])
    ->name('post.')
    ->prefix('post/')
    ->group(function () {
        Route::get('create', 'PostController@create')->name('create');
        Route::post('', 'PostController@store')->name('store');
        Route::get('{post}/edit', 'PostController@edit')->name('edit')->middleware('can:update,post');
        Route::put('{post}', 'PostController@update')->name('update')->middleware('can:update,post');;
        Route::delete('{post}', 'PostController@destroy')->name('destroy')->middleware('can:update,post');;
    });
Route::get('post/{post}', 'PostController@show')->name('post.show');

Route::get('{user}', [ProfileController::class, 'index'])->name('profile.show');


Route::middleware('auth')
    ->name('account.')
    ->prefix('account/')
    ->group(function () {
        Route::get('edit', 'ProfileController@edit')->name('edit');
        Route::post('edit', 'ProfileController@update')->name('update');
    });
