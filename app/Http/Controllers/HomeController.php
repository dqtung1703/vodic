<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $featured_posts = Post::published()
                ->with(['category', 'user'])
                ->latest()
                ->take(6)
                ->get();

            $categories = Category::active()
                ->withCount(['posts' => function ($query) {
                    $query->where('status', 'published');
                }])
                ->having('posts_count', '>', 0)
                ->orderBy('name')
                ->get();

            // Get posts grouped by category for tabs
            $postsByCategory = [];
            foreach ($categories as $category) {
                $postsByCategory[$category->id] = Post::published()
                    ->with(['category', 'user'])
                    ->where('category_id', $category->id)
                    ->latest()
                    ->take(3)
                    ->get();
            }

            // Get popular posts for sidebar
            $popularPosts = Post::published()
                ->with(['category'])
                ->orderBy('views', 'desc')
                ->take(5)
                ->get();

            // Get important posts for sidebar
            $importantPosts = Post::important()
                ->with(['category'])
                ->take(5)
                ->get();

            return view('home', compact('featured_posts', 'categories', 'postsByCategory', 'popularPosts', 'importantPosts'));
            
        } catch (\Exception $e) {
            Log::error('Error in HomeController@index: ' . $e->getMessage());
            
            // Fallback với dữ liệu trống
            $featured_posts = collect([]);
            $categories = collect([]);
            $postsByCategory = [];
            
            return view('home', compact('featured_posts', 'categories', 'postsByCategory'))
                ->with('error', 'Có lỗi xảy ra khi tải trang chủ');
        }
    }
}
