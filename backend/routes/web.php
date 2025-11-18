<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User must login first
Route::middleware(['auth'])->group(function () {

    // User request author access
    Route::get('/request-author', [AuthController::class, 'showRequestForm']);
    Route::post('/request-author', [AuthController::class, 'requestAuthor']);

    // Admin only
    Route::middleware('admin')->group(function () {
        Route::get('/requested-authors', [AuthController::class, 'requestedAuthors']);
        Route::post('/approve-author/{id}', [AuthController::class, 'approveAuthor']);

        // Admin rejects author
        Route::post('/reject-author/{id}', [AuthController::class, 'rejectAuthor']);
        Route::get('/authors', [AuthController::class, 'authors']);
    });

    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth'])->group(function () {});


require __DIR__ . '/auth.php';
