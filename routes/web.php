<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
Route::get('/bestAuthor', [UserController::class, 'index']);
Route::get('/rating', [RatingController::class, 'index']);
Route::post('/rating', [RatingController::class, 'inputRating']);

// API 
Route::prefix('api')->group(function () {
    Route::get('/books', [BookController::class, 'apiBook']);
    Route::get('/authors', [UserController::class, 'apiBestAuthor']);
    Route::post('/ratings', [RatingController::class, 'apiRating']);
});
