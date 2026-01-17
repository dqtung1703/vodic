<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes - Không cần đăng nhập
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tim-kiem', [PostController::class, 'index'])->name('search');
// Tin tức
Route::get('/tin-tuc', [PostController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('news.show');

// Danh mục
Route::get('/danh-muc', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/danh-muc/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Trang tĩnh
Route::view('/gioi-thieu', 'pages.about')->name('about');
Route::view('/lien-he', 'pages.contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Admin Routes - Chỉ admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Categories Management
    Route::resource('categories', AdminCategoryController::class);
    
    // Posts Management
    Route::resource('posts', AdminPostController::class);
    Route::delete('posts/images/{image}', [AdminPostController::class, 'deleteImage'])
        ->name('posts.images.delete');
    
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
