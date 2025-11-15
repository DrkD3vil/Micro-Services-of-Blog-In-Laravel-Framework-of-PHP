<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
// Routes protected by Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // General user routes
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Fetch all users (admin only inside controller)
    Route::get('/users', [AuthController::class, 'users']);

    // Request author role (regular user)
    Route::post('/request-author', [AuthController::class, 'requestAuthor']);

    // Admin only routes
    Route::get('/requested-authors', [AuthController::class, 'requestedAuthors']);
    Route::post('/approve-author/{id}', [AuthController::class, 'approveAuthor']);
    Route::get('/authors', [AuthController::class, 'authors']);
});
