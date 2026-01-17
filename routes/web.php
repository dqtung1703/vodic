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

// Admin Routes - SỬA middleware từ ['auth', 'admin'] thành 'admin' vì admin middleware đã include auth
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('posts', AdminPostController::class);
    Route::delete('posts/images/{image}', [AdminPostController::class, 'deleteImage'])
        ->name('posts.images.delete');
});

require __DIR__.'/auth.php';