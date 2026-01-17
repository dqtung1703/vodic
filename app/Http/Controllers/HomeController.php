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
                ->get();

            return view('home', compact('featured_posts', 'categories'));
            
        } catch (\Exception $e) {
            Log::error('Error in HomeController@index: ' . $e->getMessage());
            
            // Fallback với dữ liệu trống
            $featured_posts = collect([]);
            $categories = collect([]);
            
            return view('home', compact('featured_posts', 'categories'))
                ->with('error', 'Có lỗi xảy ra khi tải trang chủ');
        }
    }
}
