<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tin-tuc', [PostController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('news.show');
Route::get('/danh-muc', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/danh-muc/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::view('/gioi-thieu', 'pages.about')->name('about');
Route::view('/lien-he', 'pages.contact')->name('contact');
Route::get('/tim-kiem', [PostController::class, 'index'])->name('search');

// User Routes (Authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    Route::prefix('my-posts')->name('user.posts.')->group(function () {
        Route::get('/', [\App\Http\Controllers\UserPostController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\UserPostController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\UserPostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [\App\Http\Controllers\UserPostController::class, 'edit'])->name('edit');
        Route::put('/{post}', [\App\Http\Controllers\UserPostController::class, 'update'])->name('update');
        Route::delete('/{post}', [\App\Http\Controllers\UserPostController::class, 'destroy'])->name('destroy');
    });
});

// Admin Routes - SỬA middleware từ ['auth', 'admin'] thành 'admin' vì admin middleware đã include auth
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('posts', AdminPostController::class);
    Route::delete('posts/images/{image}', [AdminPostController::class, 'deleteImage'])
        ->name('posts.images.delete');
    
    // User Management
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::post('users/{user}/lock', [\App\Http\Controllers\Admin\UserController::class, 'lock'])
        ->name('users.lock');
    Route::post('users/{user}/unlock', [\App\Http\Controllers\Admin\UserController::class, 'unlock'])
        ->name('users.unlock');
});

require __DIR__.'/auth.php';