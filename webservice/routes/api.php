<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    Route::get('/user', function (Request $request) {
        $user = $request->user();
        $user->person;
        return $user;
    });
    Route::prefix('user')->group(function () {
        Route::put('update', [App\Http\Controllers\UserController::class, 'update']);
        Route::delete('destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
    });
});

