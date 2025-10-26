<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [PostController::class, 'index'])->name('blog.index');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('posts', PostController::class)->except(['show']);
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
});

// Blog post routes (must be last to avoid conflicts with other routes)
Route::get('/{slug}', [PostController::class, 'show'])->name('blog.show');
