<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'draft_posts' => Post::where('status', 'draft')->count(),
            'total_categories' => Category::count(),
            'total_users' => User::count(),
            'total_views' => Post::sum('views'),
        ];

        $recent_posts = Post::with(['category', 'user'])
            ->latest()
            ->take(10)
            ->get();

        $popular_posts = Post::where('status', 'published')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_posts', 'popular_posts'));
    }
}
