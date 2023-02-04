<?php

use App\Http\Controllers\Api\BookController;
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

Route::post('/register', [App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\UserController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function(Request $request) {
        return auth()->user();
    });
    // API route for logout user
    Route::delete('/user/logout', [App\Http\Controllers\Api\UserController::class, 'logout']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get("/books", [BookController::class, 'index']);
    Route::get("/books/{id}", [BookController::class, 'show']);
    Route::put("/books/{id}/edit", [BookController::class, 'update']);
    Route::delete("/books/{id}/delete", [BookController::class, 'destroy']);
    Route::post("/books/add", [BookController::class, 'store']);
    Route::post("/books/search", [BookController::class, 'search']);
});