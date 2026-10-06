<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AdminPostController;
use Illuminate\Support\Facades\Route;

// ===== GUEST ROUTES =====
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/projects/{id}', [PageController::class, 'projectDetail'])->name('projects.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// ===== PUBLIC POSTS (anyone can browse) =====
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// ===== ADMIN ONLY (MUST be before /posts/{id}) =====
Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/posts', [AdminPostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [AdminPostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{id}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{id}', [AdminPostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{id}', [AdminPostController::class, 'destroy'])->name('posts.destroy');
        Route::post('/posts/{id}/restore', [AdminPostController::class, 'restore'])->name('posts.restore');            // NEW
        Route::delete('/posts/{id}/force-delete', [AdminPostController::class, 'forceDelete'])->name('posts.forceDelete'); // NEW
    });
    

// ===== AUTHENTICATED ROUTES =====
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/skills', [DashboardController::class, 'skills'])->name('skills.index');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/profile-details', [DashboardController::class, 'profileDetails'])->name('profile.details');
    Route::get('/my-projects', [DashboardController::class, 'myProjects'])->name('my-projects.index');

    // Submit post — must be before /posts/{id}
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

// ===== PUBLIC SINGLE POST (wildcard — MUST be last) =====
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// ===== BREEZE PROFILE =====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';