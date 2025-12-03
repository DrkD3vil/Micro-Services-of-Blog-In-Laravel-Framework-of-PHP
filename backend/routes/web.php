<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\web\UserController;
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


// Admin User Management Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Additional Admin Actions
    Route::post('/users/{user}/impersonate', [UserController::class, 'impersonate'])->name('users.impersonate');
    Route::post('/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset-password');
    Route::post('/users/{user}/verify-email', [UserController::class, 'verifyEmail'])->name('users.verify-email');
    Route::post('/users/{user}/unverify-email', [UserController::class, 'unverifyEmail'])->name('users.unverify-email');
    Route::patch('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
    Route::patch('/users/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('users.remove-admin');
});


Route::middleware(['auth'])->group(function () {});


require __DIR__ . '/auth.php';
