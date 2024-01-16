<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//// with authentication ////
// Route::post('auth/register', [App\Http\Controllers\Api\AuthenticationController::class, 'register']);
// Route::post('auth/login', [App\Http\Controllers\Api\AuthenticationController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('auth/logout', [App\Http\Controllers\Api\AuthenticationController::class, 'logout']);
//     Route::get('auth/active', [App\Http\Controllers\Api\AuthenticationController::class, 'active']);

//     Route::apiResource('questions', App\Http\Controllers\Api\QuestionController::class);
//     Route::apiResource('avatars', App\Http\Controllers\Api\AvatarController::class);
// });



//// without authentication ////
Route::apiResource('/questions', App\Http\Controllers\Api\QuestionController::class);
Route::apiResource('/avatars', App\Http\Controllers\Api\AvatarController::class);
Route::apiResource('/diamonds', App\Http\Controllers\Api\DiamondController::class);
