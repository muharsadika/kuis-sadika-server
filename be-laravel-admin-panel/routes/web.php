<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::Resource('/questions', App\Http\Controllers\QuestionController::class);
Route::Resource('/avatars', App\Http\Controllers\AvatarController::class);
Route::Resource('/diamonds', App\Http\Controllers\DiamondController::class);
