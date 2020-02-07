<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Post;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('posts', function () {
    return response()->json(['posts' => Post::query()->whereIn('user_id', Auth::user()->followings()->where('status', 1)->get())->with(['media'])->latest()->get()]);
});
Route::post('login', [AuthController::class, 'login']);
