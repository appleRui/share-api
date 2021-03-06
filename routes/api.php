<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/v1/post', PostController::class)->only(['index', 'store', 'update', 'destroy', 'show']);
Route::get('/v1/like', [LikeController::class, 'hasLike']);
Route::post('/v1/like', [LikeController::class, 'store']);
Route::delete('/v1/like', [LikeController::class, 'destroy']);
Route::apiResource('/v1/post.comments', CommentController::class)->only(['index', 'store', 'update', 'destroy']);