<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
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
    }
}
