<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);

Route::post('/conversations', [ConversationController::class, 'store']);

Route::get('/conversations/{id}', [ConversationController::class, 'show']);

Route::get('/conversations/{id}/messages', [MessageController::class, 'show']);

Route::post('/conversations/{id}/messages', [MessageController::class, 'store']);

