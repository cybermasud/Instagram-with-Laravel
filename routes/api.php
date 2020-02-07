<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Http\Request;

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
    return response()->json(['posts' => 'posts']);
});
Route::post('login', [AuthController::class, 'login']);
